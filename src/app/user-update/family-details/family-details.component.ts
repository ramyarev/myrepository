import { Component, OnInit } from '@angular/core';
import { DataProviderService } from 'src/app/service/data-provider.service';

@Component({
  selector: 'app-family-details',
  templateUrl: './family-details.component.html',
  styleUrls: ['./family-details.component.scss']
})
export class FamilyDetailsComponent implements OnInit {

  family_types=[];
  family_statuses=[];
  jobs = [];
  updateClicked = false;
  fatherNameText:any;
  fatherOccupationText:any;
  motherNameText:any;
  motherOccupationText:any;
  noOfSiblingsText:any;
  aboutFamily:any;
  
  constructor(private dps:DataProviderService) { }

  ngOnInit() {
    this.family_types = this.dps.family_types;
    this.family_statuses = this.dps.family_statuses;
    this.jobs = this.dps.jobs;
    this.family_types = this.dps.family_statuses;
  }

  updateUser(form) {
    this.updateClicked = true;
    console.log(form.value);
    if (form.valid) {
      console.log('form is valid');
    } else {
      console.log('form is invalid');
    }
    
  }


}
