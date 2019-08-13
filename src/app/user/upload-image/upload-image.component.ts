import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';
import { environment } from 'src/environments/environment';


@Component({
  selector: 'app-upload-image',
  templateUrl: './upload-image.component.html',
  styleUrls: ['./upload-image.component.scss']
})
export class UploadImageComponent implements OnInit {

  ourFile: File;
  selectedImageURL = '';
  user: any = {};
  uploadedImage = "";
  fielToUpload: any = {};
  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    ) { }

  ngOnInit() {
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.user.user_id = params.get("id");
      this.userService.getUser(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
          if(resp.user.profile_image){
            this.uploadedImage = environment.uploads+'profile_image/'+resp.user.profile_image;
          }
          this.user = resp.user;
      });
    });
    this.user.profile_image = "";
  }
  next(){
    if(this.selectedImageURL){
      this.userService.upload(this.fielToUpload)
      .pipe(first())
      .subscribe(
        (response: any) => {
          if(response.status == "true"){
            this.router.navigateByUrl('/profile/identity/'+this.user.user_id);
          }else{
            console.log(response.msg);
          }
        }
      );    
    }else{
      this.router.navigateByUrl('/profile/identity/'+this.user.user_id);
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
          type: 'profile_image',
          user_id: this.user.user_id
        };
        this.selectedImageURL = event.target.result;
      }
    }
  }
}
