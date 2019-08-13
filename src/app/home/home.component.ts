import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { SlicePipe } from '@angular/common';
import { User } from './User';
import { AuthenticationService } from './authentication.service';
import { GlobalService } from '../service/global.service';
import { DataProviderService } from '../service/data-provider.service';
import { Router } from '@angular/router';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';
import { LoginComponent } from '../login/login.component';
import { SignupComponent } from '../signup/signup.component';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  @ViewChild('btnLoginClose') btnLoginClose: ElementRef;

  date: string;
  user: User;
  signupClicked = false;
  loginClicked = false;
  profileCreatedBy = [];
  errorMsg = '';
  showError = false;
  codes = [];
  religions = [];
  lookingFor = [];
  selectedLookingForItem = '';

  constructor(private authService: AuthenticationService,
    private globalService: GlobalService,
    private dps: DataProviderService,
    private router: Router,
    public dialog: MatDialog) {
    this.globalService.setLogined(true);
    this.profileCreatedBy = this.dps.profileCreatedBy;
    this.codes = this.dps.codes;
    this.religions = this.dps.religions;

    this.lookingFor = this.dps.lookingFor;
    this.selectedLookingForItem = this.lookingFor[0];
  }

  ngOnInit() {

  }

  dobSelected() {
  }

  onSignup(form) {
    this.signupClicked = true;
    this.user = form.value;
    console.log(this.user);
    if (form.valid) {
      this.user.login_type = "default";
      this.user.device_id = "";
      this.authService.signup(this.user);
      this.showError = false;
      this.errorMsg = "";
      console.log('form is valid');
    } else {
      this.showError = true;
      this.errorMsg = "Please fill all the details for signup";
      console.log('form is invalid');
    }
  }

  login(form) {
    // this.loginClicked = true;
    // this.user = form.value;
    // console.log(this.user);
    // if (form.valid) {
    //   this.user.login_type="default";
    //   this.user.device_id="";
    //   this.authService.login(this.user);
    //   this.showError = false;
    //   this.errorMsg="";
    //   console.log('form is valid');
    // } else {
    //   this.showError = true;
    //   this.errorMsg = "Please fill all the details for login";
    //   console.log('form is invalid');
    // }
    document.getElementById("btnLoginClose").click();
    this.router.navigate(['/main/dashboard']);
  }

  onRegisterClicked() {
    this.showError = false;
    const dialogRef = this.dialog.open(SignupComponent, {
      width: '500px'
    });
  }

  onLoginClicked() {
    this.showError = false;
    const dialogRef = this.dialog.open(LoginComponent, {
      width: '500px'
    });
  }

}
