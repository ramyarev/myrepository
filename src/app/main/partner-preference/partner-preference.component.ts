// import { Component, OnInit } from '@angular/core';
// import { DataProviderService } from '../../service/data-provider.service';

// @Component({
//   selector: 'app-partner-preference',
//   templateUrl: './partner-preference.component.html',
//   styleUrls: ['./partner-preference.component.scss']
// })
// export class PartnerPreferenceComponent implements OnInit {

//   religions=[];
//   countries=[];
//   castes = [];
//   degrees=[];
//   jobs=[];
//   family_types=[];
//   family_statuses=[];
//   profileCreatedBy=[];
//   raasis = [];
//   stars = [];
//   doshams = [];
//   bodyTypes = [];
//   complexions = [];
//   maritalStatuses = [];
//   codes = [];
//   feets = [];
//   inches = [];
//   kgs = [];
//   gms = [];
//   preferred_cities = [""];
//   updateClicked = false;
//   subCasteText:any;
//   languages:any;
//   i:any;
  
  
//   constructor(private dps:DataProviderService) { }

//   ngOnInit() {
//     this.religions = this.dps.religions;
//     this.countries = this.dps.countries;
//     this.degrees = this.dps.degress;
//     this.castes = this.dps.castes;
//     this.family_types = this.dps.family_types;
//     this.family_statuses = this.dps.family_statuses;
//     this.profileCreatedBy = this.dps.profileCreatedBy;
//     this.raasis = this.dps.raasis;
//     this.stars = this.dps.stars;
//     this.doshams = this.dps.doshams;
//     this.bodyTypes = this.dps.bodyTypes;
//     this.complexions = this.dps.complexions;
//     this.maritalStatuses = this.dps.maritalStatuses;
//     this.jobs = this.dps.jobs;
//     this.codes = this.dps.codes;
//     this.feets = this.dps.feets;
//     this.inches = this.dps.inches;
//     this.kgs = this.dps.kgs;
//     this.gms = this.dps.gms;
//   }

//   updateUser(form) {
//     this.updateClicked = true;
//     console.log(form.value);
//     if (form.valid) {
//       console.log('form is valid');
//     } else {
//       console.log('form is invalid');
//     }
    
//   }

//   addPreferredCity(index) {
//     this.preferred_cities.push("");
//   }

// }
