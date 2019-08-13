import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-partner-preference',
  templateUrl: './partner-preference.component.html',
  styleUrls: ['./partner-preference.component.scss']
})
export class PartnerPreferenceComponent implements OnInit {

  heights = ["Below 4ft", "4ft 06in", "4ft 07in", "4ft 08in", "4ft 09in", "4ft 10in", "4ft 11in",
    "5ft", "5ft 01in", "5ft 02in", "5ft 03in", "5ft 04in", "5ft 05in", "5ft 06in", "5ft 07in", "5ft 08in", "5ft 09in", "5ft 10in", "5ft 11in",
    "6ft", "6ft 01in", "6ft 02in", "6ft 03in", "6ft 04in", "6ft 05n", "6ft 06in", "6ft 07in", "6ft 08in", "6ft 09in", "6ft 10in", "6ft 11in",
    "7ft", "Above 7ft"];
    range = (start, end) => Array.from({length: (end - start)}, (v, k) => k + start);
    weights = this.range(40,141);
    ages = this.range(21, 51);
    raasis: string[] = ["Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorn","Aquarius","Pisces","Others"];
    educations = ["B.ARCH", "BCA", "BE", "B.PLAN", "B.sc IT/Computer science", "B.TECH", "M.ARCH", "MCA", "ME", "M.sc IT/Computer science", "M.S (ENGG)",
      "M.TECH", "PGDCA", "B.ARCH", "B.COM", "B.ED", "BFA", "BFT", "BLIS", "BMM", "B.sc", "B.S.W", "B.PHIL", "M.A", "M.COM", "M.ED", "MFA", "MLIS",
      "M.sc", "MSW", "M.PHIL", "BBA", "BFM", "BHM", "MBA", "MFM", "MHM", "MHRM", "BCA", "PGDM", "B.A.M.S", "BDS", "BHMS", "BSMS", "B.PHARM", "BPT", "BUMS",
      "BVSC", "MBBS", "B.SC (NURSING)", "MDS", "MD/MS (MEDICAL)", "M.PHARM", "MPT", "MVSC", "BGL", "B.L", "LLB", "L.L.M", "M.L", "CA", "CFA", "CS",
      "ICWA", "IAS", "IES", "IFS", "IRS", "IPS", "Ph.d", "Diploma", "Polytechnic"];
    occupations = ["Admin","Supervisor","Manager","Officer","Administrative Professional","executive","clerk","Human Resource Professional",
      "Agriculture","Agriculture and farming professional","Airline","Pilot","Air Hostess","Airline professionals","Architech and Design",
      "Architech","Interior designer","Banking and finance","Chartered Accountant","Company Secretary","Accounts/financial Professional",
      "Auditor","Financial Analyst/ Planning","Beauty and Fashion","Fashion Designer","Beautician","Civil services (IAS/IPS/IRS/IES/IFS)",
      "Defence","Army","Navy","Air force","Education","Professor/lecturer","Educational Professional","Hospitality","Hotel/Hospitality Professional",
      "IT/Engineering","Software Professional","Hardware Professional","Engineer Non-IT","Designer","Legal","Lawyer and legal Professional",
      "Medical","Doctor","Healthcare professional","Paramedical Professional","Nurse","Marketing profesisonal","Sales Professional",
      "Journalist","Media Professional","Entertainment Professional","Event management professional","Advertising/PR Professional",
      "Mariner/Merchant Navy","Scientist","Scientist Research","CXO","Business Analyst","Consultant","Customer Care Professional",
      "Social Worker","Sportsman","Technician","Arts and Craftsman","Librarian","Business Owner/Enterprenuer","Others"];
    stars = ["Anusham","Aswini","Avittam","Ayilyam","Bharani","Chithirai","Hastham","Kettai","Krithigai","Maham","Moolam","Mrigasirisham",
      "Poosam","Punarpusam","Puradam","Puram","Puratathi","Revathi","Rohini","Sadayam","Swathi","Thiruvadirai","Uthradam",
      "Uthram","Uthratadhi","Visakam"];
    doshams = ["Chevvai Dosham","Naga Dosham","Kaalasarpa Dosham","Ketu Dosham","Rahu Dosham","Kalathra Dosham"]
    marital_statuses = ["ANY","NEVER MARRIED","WIDOWED","DIVORCED","AWAITING DIVORCE"];
    castes:any[] = [];
    castesWithSubcastes:any[] = [];
    subcastes:any[] = [];
    languages: string[] = ["Tamil","English","Hindi","Telugu","Marathi","Kannada","Gujarathi","Urdu"];
    states:any[] = [];
    statesWithCities:any[] = []; 
    cities:any[] = [];
    countries=[
      "Indian",
      "Sri Lankan",
      "Russian",
      "American",
      "Pakistanian",
      "British",
      "Irish",
      "Brazilian",
      "Italian",
      "Chinese",
      "Polish",
      "Austrian",
      "Canadian",
      "Malaysian",
      "South Korean",
      "North Korean",
      "German",
      "Swedish",
      "French",
      "Swiss",
      "Others",
    ];

  constructor(
    private http: HttpClient,
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
  ) { }
  user: any = {};
  ngOnInit() {
    this.activatedRoute.paramMap
    .pipe(first())
    .subscribe(params => {
      this.user.user_id = params.get("id");
      this.userService.getPartner(params.get("id"))
      .pipe(first())
      .subscribe((resp: any) =>{
        if(resp.status == "true"){
          this.user = resp.user;
        }
      });
    });

    this.user.min_age = "";
    this.user.max_age = "";
    this.user.min_height = "";
    this.user.max_height = "";
    this.user.min_weight = "";
    this.user.max_weight = "";
    this.user.caste = "";
    this.user.sub_caste = "";
    this.user.marital_status = "";
    this.user.mother_tongue = "";
    this.user.raasi = "";
    this.user.natchathiram = "";
    this.user.paadham = "";
    this.user.dosham = "";
    this.user.education = "";
    this.user.profession = "";
    this.user.any_disability = "";
    this.user.nationality = "";
    this.user.country = "";
    this.user.preferred_cities = "";
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

  preferenceSubmit(){
    this.userService.updatePartner(this.user)
    .pipe(first())
    .subscribe(
      (response: any) => {
        console.log(response);
        if(response.status == "true"){
          this.router.navigateByUrl('/dashboard'+response.user.user_id);
        }else{
          console.log(response.msg);
        }
      }
    );    
  }
}
