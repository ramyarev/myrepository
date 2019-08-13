import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-primary-details',
  templateUrl: './primary-details.component.html',
  styleUrls: ['./primary-details.component.scss']
})
export class PrimaryDetailsComponent implements OnInit {

  user: any = {};
  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    ) { }
  heights = ["Below 4ft", "4ft 06in", "4ft 07in", "4ft 08in", "4ft 09in", "4ft 10in", "4ft 11in",
    "5ft", "5ft 01in", "5ft 02in", "5ft 03in", "5ft 04in", "5ft 05in", "5ft 06in", "5ft 07in", "5ft 08in", "5ft 09in", "5ft 10in", "5ft 11in",
    "6ft", "6ft 01in", "6ft 02in", "6ft 03in", "6ft 04in", "6ft 05n", "6ft 06in", "6ft 07in", "6ft 08in", "6ft 09in", "6ft 10in", "6ft 11in",
    "7ft", "Above 7ft"];
    range = (start, end) => Array.from({length: (end - start)}, (v, k) => k + start);
    weights = this.range(40,141);
    
  ngOnInit() {
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.user.user_id = params.get("id");
      this.userService.getUser(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
        if(resp.user.about_myself){
          this.user = resp.user;
        }
      });
    });
    this.user.about_myself = "";
    this.user.height = "";
    this.user.weight = "";
    this.user.body_type = "";
    this.user.complexion = "";
    this.user.physical_status = "";
    this.user.smoking_habits = "";
    this.user.drinking_habits = "";
    this.user.eating_habits = "";
    this.user.marital_status = "";
    this.user.no_of_children = "";
  }

  basicDetails(){
    this.userService.updateUser(this.user)
    .pipe(first())
    .subscribe(
      (response: any) => {
        if(response.status == "true"){
          this.router.navigateByUrl('/profile/education/'+response.user.user_id);
        }else{
          console.log(response.msg);
        }
      }
    );    
  }

}
