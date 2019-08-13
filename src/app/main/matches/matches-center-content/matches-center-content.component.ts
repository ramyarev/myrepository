import { MatchesService } from './../matches.service';
import { Component, OnInit, AfterContentInit, ElementRef } from '@angular/core';
import { Observable, of } from 'rxjs';

export enum MatchStyle {
  VIEW = 'VIEW',
  TODAY = 'TODAY',
  PREMIUM = 'PREMIUM',
  RECOMMENDATIONS = 'RECOMMENDATIONS',
  NEAR_BY_ME = 'NEAR_BY_ME',
}

@Component({
  selector: 'app-matches-center-content',
  templateUrl: './matches-center-content.component.html',
  styleUrls: ['./matches-center-content.component.scss']
})

export class MatchesCenterContentComponent implements OnInit, AfterContentInit {
  protected currentIndex: number;
  protected speed: number;
  protected infinite: boolean;
  protected direction: string;
  protected directionToggle: boolean;
  protected autoplay: boolean;

  protected showThisMatch$: Observable<any>;
  protected todayMatches$: Observable<any>;
  protected premiumMatches$: Observable<any>;
  protected recommendationsMatches$: Observable<any>;
  protected nearByMeMatches$: Observable<any>;
  constructor(
    private matchesService: MatchesService,
    private elementRef: ElementRef
    ) {
    this.showThisMatch$ = of(MatchStyle.VIEW.toString());

    this.todayMatches$ = of([1, 2, 3]);
    this.premiumMatches$ = of([1, 2, 3]);
    this.recommendationsMatches$ = of([1, 2, 3]);
    this.nearByMeMatches$ = of([1, 2, 3]);
  }

  ngOnInit() {
    const ele = this.elementRef.nativeElement.querySelector('.whole-container');
    if (!!ele) {
      ele.addEventListener('click', (event) => {
        if (!!event.target.closest('button')
        && !!event.target.closest('button').dataset
        && !!event.target.closest('button').dataset.view) {
          this.showThisSelectedMatch(event.target.closest('button').dataset.view);
        }
      });
    }
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

  showThisSelectedMatch (selectedMatch: string) {
    this.matchesService.$showThisMatch$.next(selectedMatch);
    this.matchesService.$matchesInput$.next([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
  }
}
