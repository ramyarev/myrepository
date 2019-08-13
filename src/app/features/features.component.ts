  import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-features',
  templateUrl: './features.component.html',
  styleUrls: ['./features.component.scss']
})
export class FeaturesComponent implements OnInit {

  features = [];
  constructor() { }

  ngOnInit() {
    this.features = [
      {
        title:"LOCALITY MATCHES",
        desc:"Location based matrimonial,linksget to your nearby locality alliance",
        img:"../../assets/images/location.png"
      },
      {
        title:"VERIFIED CONTACTS",
        desc:"Fully Verified and trusted contact can be shown and added here",
        img:"../../assets/images/verifiedcontacts.png"
      },
      {
        title:"COMMUNICATION",
        desc:"Direct Communication with your solumate as your interest",
        img:"../../assets/images/communication.png"
      },
      {
        title:"GALLERIES",
        desc:"People can add 20 and more photographs for more visibility",
        img:"../../assets/images/gallery.png"
      },
      {
        title:"NOTIFICATION",
        desc:"Get instant alert everytime as your needs",
        img:"../../assets/images/notification.png"
      },
      {
        title:"CUSTOMER NEEDS",
        desc:"Friendly customer care service to find your partner easier",
        img:"../../assets/images/customercare.png"
      }
    ];
  }

}
