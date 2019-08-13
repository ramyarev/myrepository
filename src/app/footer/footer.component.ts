import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  constructor() { }

  languages = [];
  castes = [];
  states = [];
  religions = [];
  countries = [];

  ngOnInit() {
    this.religions = ["Hindu","Jains","Muslims","Christian","Sikh","Parsi","Budshist","Jewish"];
    this.castes = ["Agarwal","Gupta","Arora","Baniya","Brahmin","Jat","Kayastha","Khatri","Rajput","Sunni"];
    this.states = ["Tamil&nbsp;Nadu","Kerala","Karnataka","Andhra&nbsp;Pradesh",
    "Telengana","Maharashtra","Bihar","Uttar&nbsp;Pradesh","West&nbspBengal","Delhi","Madhya&nbsp;Pradesh","Orissa","Gujarat"];
    this.languages = ["Tamil","Malayalam","Kannada","Telugu","Hindi","Punjabi","Urdu","Bengali","Gujarati","Marathi"];
    this.countries = ["India","USA","UK","Canada","Australia"];
  }

}
