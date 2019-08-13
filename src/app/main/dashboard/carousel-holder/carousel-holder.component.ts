import { Component, OnInit } from '@angular/core';
// import { OwlOptions } from 'ngx-owl-carousel-o';

@Component({
  selector: 'app-carousel-holder',
  templateUrl: './carousel-holder.component.html',
  styleUrls: ['./carousel-holder.component.scss']
})
export class CarouselHolderComponent implements OnInit {
  currentIndex = 0;
  speed = 5000;
  infinite = true;
  direction = 'right';
  directionToggle = true;
  autoplay = true;

  avatars = '1234567891234'.split('').map((x, i) => {
    const num = i;
    // const num = Math.floor(Math.random() * 1000);
    return {
      url: `https://picsum.photos/600/400/?${num}`,
      title: `${num}`
    };
  });

  constructor() { }

  click(i) {
    console.log(`${i}`);
  }

  ngOnInit() {
  }

}
