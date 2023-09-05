<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CrawlMongo extends Model
{
    protected $connection = 'mongodb'; // Specify the MongoDB connection
    protected $collection = 'webcrawl'; // Specify the MongoDB collection name
    protected $fillable = ['url']; // Define the fillable fields
}
