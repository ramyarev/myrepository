import { Component, OnInit } from '@angular/core';
import { MatDialogRef, MatDialog } from '@angular/material';
import { SignupComponent } from '../signup/signup.component';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  loginEmailText:any;
  loginClicked:any;
  loginPasswordText:any;
  showError:any;

  constructor(
    public dialogRef: MatDialogRef<LoginComponent>,
    public dialog: MatDialog
    ) {}
    onRegister(){
      this.dialogRef.close();
      this.dialog.open(SignupComponent, {
        width: '500px'
      });  
    }
  onClose(){
    this.dialogRef.close();
  }
  login(loginForm){

  }
}


