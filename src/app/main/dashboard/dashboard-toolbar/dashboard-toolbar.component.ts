import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { MatchesService } from '../../matches/matches.service';
import { MatchStyle } from '../../matches/matches-center-content/matches-center-content.component';

@Component({
    selector: 'app-dashboard-toolbar',
    templateUrl: 'dashboard-toolbar.component.html',
    styleUrls: ['dashboard-toolbar.component.scss']
})
export class DashboardToolbarComponent {
    constructor(
        private router: Router,
        private matchesService: MatchesService
    ) {
        console.log('inside DashboardToolbarComponent constructor');
    }

    openDashboard() {
        this.router.navigate(['/dashboard']);
    }

    openMatches() {
        this.matchesService.$showThisMatch$.next(MatchStyle.VIEW);
        this.router.navigate(['/matches']);
    }
}
