<?php

namespace App\Http\Controllers;

use App\Models\CrawlMongo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CrawlMongo as ModelsCrawlMongo;

class CrawlerController extends Controller
{
    public function crawl(Request $request)
    {
        $url = $request->input('url');
        $depth = $request->input('depth', 1); // Default depth is 1 if not provided

        $crawledUrls = $this->crawlRecursive($url, $depth);

        // Store the crawled URLs in MongoDB using the CrawlMongo model
        foreach ($crawledUrls as $crawledUrl) {
           // CrawlMongo::updateOrCreate(['url' => $crawledUrl]);
        }

        return response()->json($crawledUrls);
    }

    private function crawlRecursive($url, $maxDepth, $currentDepth = 0, &$crawledUrls = [])
    {
        if ($currentDepth >= $maxDepth) {
            return [];
        }

        $response = Http::get($url);

        if ($response->successful()) {
            $crawledUrls[] = $url;

            // Parse the HTML content of the page and extract links
            $html = $response->body();
            $links = $this->extractLinks($html);

            // Recursively crawl linked pages
            foreach ($links as $link) {
                if (!in_array($link, $crawledUrls, true)) {
                    $this->crawlRecursive($link, $maxDepth, $currentDepth + 1, $crawledUrls);
                }
            }
        }

        return $crawledUrls;
    }

    private function extractLinks($html)
    {
        // Use a suitable method to extract links from the HTML content
        // Here, we use a simple regular expression for demonstration purposes
        preg_match_all('/<a\s+href=["\'](https?:\/\/[^"\']+)["\']/', $html, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }

        return [];
    }
}
