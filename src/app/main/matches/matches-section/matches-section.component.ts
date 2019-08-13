import { Observable } from 'rxjs';
import { Component, OnInit } from '@angular/core';
import { MatchesService } from '../matches.service';
import { pipe } from '@angular/core/src/render3';
import { tap } from 'rxjs/operators';

@Component({
  selector: 'app-matches-section',
  templateUrl: './matches-section.component.html',
  styleUrls: ['./matches-section.component.scss']
})
export class MatchesSectionComponent implements OnInit {

  protected displayContent$: Observable<any>;
  constructor(private matchesService: MatchesService) {
    this.displayContent$ = this.matchesService.$showThisMatch$.
    pipe(
      tap((matchName: string) => {
        return Observable.create(observer => observer.next(matchName.toString()));
      })
    );
  }

  ngOnInit() {
  }

}
