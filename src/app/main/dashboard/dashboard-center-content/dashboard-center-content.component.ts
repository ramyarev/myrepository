import { Component, OnInit, AfterContentInit } from '@angular/core';

@Component({
  selector: 'app-dashboard-center-content',
  templateUrl: './dashboard-center-content.component.html',
  styleUrls: ['./dashboard-center-content.component.scss']
})
export class DashboardCenterContentComponent implements OnInit, AfterContentInit {
  protected currentIndex: number;
  protected speed: number;
  protected infinite: boolean;
  protected direction: string;
  protected directionToggle: boolean;
  protected autoplay: boolean;
  constructor() { }

  ngOnInit() {

  }

  ngAfterContentInit() {
    this.currentIndex = 0;
    this.speed = 5000;
    this.infinite = false;
    this.direction = 'right';
    this.directionToggle = true;
    this.autoplay = true;
  }

  click(i) {
    console.log(`${i}`);
  }
}
