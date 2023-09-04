import { Component } from '@angular/core';

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

  crawl() {
    // Implement the crawling logic here and update 'crawlerResults' accordingly
  }
}
