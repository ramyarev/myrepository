import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-package',
  templateUrl: './package.component.html',
  styleUrls: ['./package.component.scss']
})
export class PackageComponent implements OnInit {

  plans = [];
  index = 0;
  selectedPlan:any;

  constructor() { }

  ngOnInit() {
    this.plans = [
      {
        name:"online",
        packages:[
          {
            name:"NM-Basic",
            view:75,
            validity:3,
            price:3300,
            color:"#4C9BE6"
          },
          {
            name:"NM-Super",
            view:150,
            validity:6,
            price:5400,
            color:"#40749C"
          },
          {
            name:"NM-Advance",
            view:300,
            validity:12,
            price:8400,
            color:"#FA62B5"
          }
        ],
        features:[
          {
          image:"dedicated-relationship.png",
          name:"Dedicated Profile Manager"
          },
          {
            image:"handpicked-profile.png",
            name:"Handpicked Profile "
          },
          {
            image:"free-profile-writing.png",
            name:"Free Profile Writing"
          },
          {
            image:"free-mobile-highlight.png",
            name:"Free Profile Highlighted"
          },
          {
            image:"view-contact.png",
            name:"View Profile"
          },
          {
            image:"view-mobile-number.png",
            name:"Free Mobile Number"
          },
          {
            image:"text.png",
            name:"Message Invite"
          },
          {
            image:"send-message.png",
            name:"Send Message"
          }
      ]
      },
      {
        name:"personalized",
        packages:[
          {
            name:"NM-Exclusive",
            view:4,
            validity:3,
            price:19000
          },
          {
            name:"NM-Supreme",
            view:4,
            validity:6,
            price:31000
          }
        ],
        features:[
          {
            image:"view-contact.png",
            name:"View Profile"
          },
          {
            image:"view-mobile-number.png",
            name:"Free Mobile Number"
          },
          {
            image:"text.png",
            name:"Message Invite"
          },
          {
            image:"send-message.png",
            name:"Send Message"
          }
      ]
      }]
  
    this.selectedPlan = this.plans[this.index];
  }

}
