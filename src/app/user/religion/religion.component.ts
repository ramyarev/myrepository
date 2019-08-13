import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-religion',
  templateUrl: './religion.component.html',
  styleUrls: ['./religion.component.scss']
})
export class ReligionComponent implements OnInit {
  protected horoscope: any;
  constructor() {
    this.horoscope = [];
  }

  ngOnInit() {
  }

  religionDetails() {}

}
