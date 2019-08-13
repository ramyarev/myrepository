import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { first } from 'rxjs/operators';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { DatePipe } from '@angular/common';


@Component({
  selector: 'app-user-detail',
  templateUrl: './user-detail.component.html',
  styleUrls: ['./user-detail.component.scss']
})
export class UserDetailComponent implements OnInit {

  constructor(
    private http: HttpClient,
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    ) { }
  user:any = {};
  states:any[] = [];
  statesWithCities:any[] = []; 
  cities:any[] = [];
  religions = ["Hindu",
    "Christian",
    "Muslim-Shia",
    'Muslim-sunni',
    "Muslim-others",
    'Jain-Digambar',
    'Jain-Shwetambar',
    "Jain-others",
    "Parsi",
    "Buddhist"];
  castes:any[] = [];
  castesWithSubcastes:any[] = [];
  subcastes:any[] = [];
  languages: string[] = ["Tamil",
    "English",
    "Hindi",
    "Telugu",
    "Marathi",
    "Kannada",
    "Gujarathi",
    "Urdu"];
  agree = false;

  ngOnInit() {
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.user.user_id = params.get("id");
      this.userService.getUser(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
        if(resp.user.dob){
          this.user = resp.user;
          this.onStateChange(this.user.state);
          this.onCasteChange(this.user.caste);
        }
      });
  });
    this.user.gender = "Male";
    this.user.state = "";
    this.user.home_city = "";
    this.user.religion = "";
    this.user.caste = "";
    this.user.sub_caste = "";
    this.user.mother_tongue = "";
    this.user.dob = null;
    this.user.age = null;
    this.states = [];
    this.cities = [];
    this.http.get(environment.backend_url+ "getstate.php")
    .pipe(first())
    .subscribe((resp: any)=> {
      this.states = resp.states;
    });
    this.http.get(environment.backend_url+ "getcity.php")
    .pipe(first())
    .subscribe((resp: any)=> {
      this.statesWithCities = resp.states;
      this.onStateChange(this.user.state);
    });
    this.http.get(environment.backend_url+ "getcaste.php")
    .pipe(first())
    .subscribe((resp: any)=> {
      this.castes = resp.castes;
    });
    this.http.get(environment.backend_url+ "getsubcaste.php")
    .pipe(first())
    .subscribe((resp: any)=> {
      this.castesWithSubcastes = resp.castes;
      this.onCasteChange(this.user.caste);
    });
  }
  onStateChange(stateId: string){
    const state = this.statesWithCities.filter(state => state.id == stateId)[0];
    if(state)
      this.cities = state.cities;
    else
      this.cities = [];
  }
  onCasteChange(casteId: string){
    const caste = this.castesWithSubcastes.filter(caste => caste.id == casteId)[0];
    if(caste)
      this.subcastes = caste.subcastes;
    else
      this.subcastes = [];
  }
  userSubmit(){
    this.userService.updateUser(this.user)
    .pipe(first())
    .subscribe(
      (response: any) => {
        if(response.status == "true"){
          this.router.navigateByUrl('/profile/verification/'+response.user.user_id);
        }else{
          console.log(response.msg);
        }
      }
    );    
  }
  dobChange(event){
    let timeDiff = Math.abs(Date.now() - event.getTime());
    this.user.age = Math.floor((timeDiff / (1000 * 3600 * 24))/365.25);  }
}
