import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-privacy',
  templateUrl: './privacy.component.html',
  styleUrls: ['./privacy.component.scss']
})
export class PrivacyComponent implements OnInit {

  privacies = [];
  constructor() { }

  ngOnInit() {
    this.privacies = [
      {
        desc:"Know your marriage profile to all or restrict to those with whom you contact",
        img:"../../assets/images/file_locked.png"
      },
      {
        desc:"Show your matrimony photos to all or restrict access to those whom you like or contact",
        img:"../../assets/images/profile_locked.png"
      },
      {
        desc:"Share matrimony contact details",
        img:"../../assets/images/phone_locked.png"
      }
    ];
  }

}
