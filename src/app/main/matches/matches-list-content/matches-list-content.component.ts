import { Component, OnInit, ElementRef } from '@angular/core';
import { MatchesService } from '../matches.service';
import { Observable, of } from 'rxjs';
import { tap, map } from 'rxjs/operators';

@Component({
  selector: 'app-matches-list-content',
  templateUrl: './matches-list-content.component.html',
  styleUrls: ['./matches-list-content.component.scss']
})
export class MatchesListContentComponent implements OnInit {
  protected matchesInput$: Observable<any>;
  protected matchName$: Observable<any>;
  protected pageSize: number;
  protected pageSizeOptions; pageSizeOptionsList: any;
  protected length = 0;
  protected matchesArray: any;
  protected gridView$: Observable<boolean>;
  protected listView$: Observable<boolean>;

  constructor(private matchesService: MatchesService,
    private elementRef: ElementRef) {
    this.pageSize = 0;
    this.pageSizeOptions = [3, 6, 9, 12];
    this.pageSizeOptionsList = [4, 8, 12];
    this.matchesService.$matchesInput$.
      subscribe(inputArray => {
        this.matchesArray = inputArray;
        this.length = this.matchesArray.length;
      });

    this.matchName$ =
      this.matchesService.$showThisMatch$.
        pipe(
          tap(showInput => showInput)
        );
    this.matchesService.$selectedView$.subscribe(view => {
      if (!!view && view === 'grid') {
        this.pageSize = 6;
        this.gridView$ = of(true);
        this.listView$ = of(false);
      } else {
        this.pageSize = 4;
        this.gridView$ = of(false);
        this.listView$ = of(true);
      }
      this.matchesInput$ = of(this.matchesArray.slice(0, this.pageSize));
    });
  }

  ngOnInit() {
    const ele = this.elementRef.nativeElement.querySelector('.view-type');
    if (!!ele) {
      ele.addEventListener('click', (event) => {
        if (!!event.target.dataset &&
          !!event.target.dataset.view) {
          /* if (event.target.classList.contains('enable-view')) {
            event.target.dataset.view === 'grid' ?
              this.matchesService.changeView('list') : this.matchesService.changeView('grid');
          } else if (event.target.classList.contains('disable-view')) {
            event.target.dataset.view === 'grid' ?
              this.matchesService.changeView('list') : this.matchesService.changeView('grid');
          } */
          event.target.dataset.view === 'grid' ?
              this.matchesService.changeView('list') : this.matchesService.changeView('grid');
        }
      });
    }
  }

  OnPageChange(event) {
    const startIndex = event.pageIndex * event.pageSize;
    let endIndex = startIndex + event.pageSize;
    if (endIndex > this.length) {
      endIndex = this.length;
    }
    this.matchesInput$ = of(this.matchesArray.slice(startIndex, endIndex));
  }

}
