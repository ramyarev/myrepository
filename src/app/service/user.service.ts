import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { User } from '../model/User';


@Injectable()
export class UserService {
    constructor(
        private http: HttpClient,
        ) { }

    getUser (userid: string) {
        return this.http.get(environment.backend_url+ "getuser.php?user_id="+userid+"&partner_id=000");
    }

    getPartner (userid: string) {
        return this.http.get(environment.backend_url+ "getpartner.php?user_id="+userid+"&partner_id=000");
    }

    updateUser (user: any) {
        return this.http.post(environment.backend_url+ "update.php",JSON.stringify(user))
    }

    sendOTP (mobile: string, email:string) {
        return this.http.post(environment.backend_url+ "sendotp.php",JSON.stringify({"mobile_number":mobile,"type":"signup","email": email}));
    }

    verifyOTP (mobile: string, otp:string, email: string) {
        return this.http.post(environment.backend_url+ "verifyotp.php",JSON.stringify({"mobile_number":mobile,"type":"signup","otp": otp,"email": email}));
    }
    upload(file:any) {
        let headers = new HttpHeaders(); 
        headers = headers.set('Accept', 'application/json');
        return this.http.post(environment.backend_url+ "upload_image.php",JSON.stringify(file));
    }

    updatePartner (partner: any) {
        return this.http.post(environment.backend_url+ "setpartner.php",JSON.stringify(partner))
    }
        
}