import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class MatchesService {

  public $matchesInput$: BehaviorSubject<any>;
  public $showThisMatch$: BehaviorSubject<string>;
  public $selectedView$: BehaviorSubject<string>;

  constructor() {
    this.$matchesInput$ = new BehaviorSubject([]);
    this.$showThisMatch$ = new BehaviorSubject('VIEW');
    this.$selectedView$ = new BehaviorSubject('grid');
  }

  changeMatch(matchToBeDisplayed, inputMatch) {
    this.$matchesInput$.next(matchToBeDisplayed);
    this.$showThisMatch$.next(inputMatch.toString());
  }

  changeView(view) {
    this.$selectedView$.next(view);
  }
}
