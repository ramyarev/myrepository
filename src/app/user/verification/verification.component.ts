import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-verification',
  templateUrl: './verification.component.html',
  styleUrls: ['./verification.component.scss']
})
export class VerificationComponent implements OnInit {

  constructor(
    private http: HttpClient,
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
) { }
  verified = false;
  user: any = {};
  errorMsg = "";
  ngOnInit() {
    this.user.mobile_number = "";
    this.user.email = "";
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.userService.getUser(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
        this.user = resp.user;
        this.userService.sendOTP(this.user.mobile_number,this.user.email)
        .pipe(first())
        .subscribe((resp: any) =>{
        });
      });
  });
}
verifyOTP(otp: string){
  this.userService.verifyOTP(this.user.mobile_number,otp,this.user.email)
  .pipe(first())
  .subscribe((resp: any) =>{
    if(resp.status == "true"){
      this.errorMsg = "";
      this.verified = true;
    }else{
      this.errorMsg = resp.msg;
    }
  });
}
  verifiedAction(){
    this.router.navigateByUrl('/profile/basic/'+this.user.user_id);
  }

}
