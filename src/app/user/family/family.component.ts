import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-family',
  templateUrl: './family.component.html',
  styleUrls: ['./family.component.scss']
})
export class FamilyComponent implements OnInit {

  user: any = {};
  occupations = ["Admin","Supervisor","Manager","Officer","Administrative Professional","executive","clerk","Human Resource Professional","Agriculture","Agriculture and farming professional","Airline","Pilot","Air Hostess","Airline professionals","Architech and Design","Architech","Interior designer","Banking and finance","Chartered Accountant","Company Secretary","Accounts/financial Professional","Auditor","Financial Analyst/ Planning","Beauty and Fashion","Fashion Designer","Beautician","Civil services (IAS/IPS/IRS/IES/IFS)","Defence","Army","Navy","Air force","Education","Professor/lecturer","Educational Professional","Hospitality","Hotel/Hospitality Professional","IT/Engineering","Software Professional","Hardware Professional","Engineer Non-IT","Designer","Legal","Lawyer and legal Professional",
  "Medical","Doctor","Healthcare professional","Paramedical Professional","Nurse","Marketing profesisonal","Sales Professional","Journalist","Media Professional","Entertainment Professional","Event management professional","Advertising/PR Professional","Mariner/Merchant Navy","Scientist","Scientist Research","CXO","Business Analyst","Consultant","Customer Care Professional","Social Worker","Sportsman","Technician","Arts and Craftsman","Librarian","Business Owner/Enterprenuer","Others"];

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
        if(resp.user.education){
          this.user = resp.user;
        }
      });
    });
    this.user.father_name = "";
    this.user.mother_name = "";
    this.user.father_occupation = "";
    this.user.mother_occupation = "";
    this.user.no_of_siblings = "";
    this.user.family_status = "";
    this.user.about_family = "";
  }
  familyDetails(){
    this.userService.updateUser(this.user)
    .pipe(first())
    .subscribe(
      (response: any) => {
        if(response.status == "true"){
          this.router.navigateByUrl('/profile/imageUpload/'+response.user.user_id);
        }else{
          console.log(response.msg);
        }
      }
    );    
  }
}
