import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-recently-joined',
  templateUrl: './recently-joined.component.html',
  styleUrls: ['./recently-joined.component.scss']
})
export class RecentlyJoinedComponent implements OnInit {

  config: SwiperOptions = {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView:4,
    slidesPerGroup:4
  };

  constructor() { }

  ngOnInit() {
  }

}
