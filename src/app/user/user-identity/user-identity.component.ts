import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

@Component({
  selector: 'app-user-identity',
  templateUrl: './user-identity.component.html',
  styleUrls: ['./user-identity.component.scss']
})
export class UserIdentityComponent implements OnInit {

  ourFile: File;
  user: any = {};
  fielToUpload: any = {};

  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    public dialog: MatDialog
) { }

  ngOnInit() {
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.user.user_id = params.get("id");
      this.userService.getUser(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
          this.user = resp.user;
      });
    });
  }
  upload(){
    if(this.ourFile){
      this.userService.upload(this.fielToUpload)
      .pipe(first())
      .subscribe(
        (response: any) => {
          const dialogRef = this.dialog.open(AlertDialog, {
            width: '250px',
            data: response.msg
          });
        }
      );    
    }
  }
  openInput(){ 
    document.getElementById("fileInput").click();
  }

  onSelectFile(event) {
    if (event.target.files && event.target.files[0]) {
      var reader = new FileReader();
      this.ourFile = event.target.files[0];
      reader.readAsDataURL(event.target.files[0]); // read file as data url

      reader.onload = (event: any) => { // called once readAsDataURL is completed
        this.fielToUpload = {
          fileName: this.ourFile.name,
          fileType: this.ourFile.type,
          fileExtension: this.ourFile.name.slice((this.ourFile.name.lastIndexOf(".") - 1 >>> 0) + 2),
          value: event.target.result.split(',')[1],
          type: 'id_proof',
          user_id: this.user.user_id
        };
      }
    }
  }

  next(){
    this.router.navigateByUrl('/profile/preference/'+this.user.user_id);
  }
}

@Component({
  selector: 'alert-dialog',
  template: `
  <h1 mat-dialog-title>Alert</h1>
  <div mat-dialog-content>
      {{data}}
  </div>
  <div mat-dialog-actions>
    <button style="margin-left:65%" mat-button (click)="onNoClick()" cdkFocusInitial>Ok</button>
  </div>
  `,
})
export class AlertDialog {

  constructor(
    public dialogRef: MatDialogRef<AlertDialog>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  onNoClick(): void {
    this.dialogRef.close();
  }

}