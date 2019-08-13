import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-dashboard-search-right-side-content',
  templateUrl: './dashboard-search-right-side-content.component.html',
  styleUrls: ['./dashboard-search-right-side-content.component.scss']
})
export class DashboardSearchRightSideContentComponent implements OnInit {
  protected selectedReligion: string;
  protected selectedMotherTongue: string;
  protected selectedCaste: string;
  constructor() {
  }

  ngOnInit() {
    this.selectedReligion = 'hindu2';
    this.selectedMotherTongue = 'tamil3';
    this.selectedCaste = 'caste2';
  }

}
