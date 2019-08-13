import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { UserService } from 'src/app/service/user.service';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.scss']
})
export class EducationComponent implements OnInit {

  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    ) { }
  user: any = {};
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
  incomes = ["Less than Rs.50 Thousand",
    "Rs.50 Thousand","Rs.1 Lakh","Rs.2 Lakh","Rs.3 Lakh","Rs.4 Lakh","Rs.5 Lakh","Rs.6 Lakh","Rs.7 Lakh","Rs.8 Lakh","Rs.9 Lakh",
    "Rs.10 Lakh","Rs.12 Lakh","Rs.14 Lakh","Rs.16 Lakh","Rs.18 Lakh","Rs.20 Lakh","Rs.25 Lakh","Rs.30 Lakh","Rs.35 Lakh",
    "Rs.40 Lakh","Rs.45 Lakh","Rs.50 Lakh","Rs.60 Lakh","Rs.70 Lakh","Rs.80 Lakh","Rs.90 Lakh","Rs.1 Crore",
    "Rs.1 Crore & Above"];
  stars = ["Anusham","Aswini","Avittam","Ayilyam","Bharani","Chithirai","Hastham","Kettai","Krithigai","Maham","Moolam","Mrigasirisham",
    "Poosam","Punarpusam","Puradam","Puram","Puratathi","Revathi","Rohini","Sadayam","Swathi","Thiruvadirai","Uthradam",
    "Uthram","Uthratadhi","Visakam"];
  doshams = ["Chevvai Dosham","Naga Dosham","Kaalasarpa Dosham","Ketu Dosham","Rahu Dosham","Kalathra Dosham"]
  
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

    this.user.education = "";
    this.user.college = "";
    this.user.occupation = "";
    this.user.office_details = "";
    this.user.monthly_income = "";
    this.user.raasi = "";
    this.user.star = "";
    this.user.paadham = "";
    this.user.having_dosham = "";
    this.user.dosham_details = "";
  }
  educationDetails(){
    this.userService.updateUser(this.user)
    .pipe(first())
    .subscribe(
      (response: any) => {
        if(response.status == "true"){
          this.router.navigateByUrl('/profile/family/'+response.user.user_id);
        }else{
          console.log(response.msg);
        }
      }
    );    
  }
}