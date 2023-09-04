import { Component } from '@angular/core';
import {HttpClient, HttpParams} from '@angular/common/http'; // Import HttpClient

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Simple Web Crawler';

  url: string = ''; // Define 'url' property
  depth: number = 0; // Define 'depth' property
  crawlerResults: any[] = []; // Define 'crawlerResults' property for storing crawler data

  constructor(private http: HttpClient) {
  }

  crawl() {
    // Make the API request with query parameters
    const apiUrl = 'http://localhost:8000/crawl';

    const params = new HttpParams()
      .set('url', this.url)
      .set('depth', this.depth.toString());

    this.http.post(apiUrl, {}, { params }).subscribe((data: any) => {
      this.crawlerResults = data;
    });
  }
}
