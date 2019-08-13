import { Injectable } from '@angular/core';
import { HttpClientModule, HttpClient, HttpParams } from '@angular/common/http';
import { User } from './User';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  constructor(private httpClient:HttpClient) { }

  signup(user:User) {
    const formData = new FormData();
    formData.append('profile_created_by', "myself");
    formData.append('name', user.name);
    formData.append('email', user.email);
    formData.append('password', user.password);
    formData.append('gender', user.gender);
    formData.append('dob', user.dob);
    formData.append('religion', "tamil");
    formData.append('mother_tongue', "tamil");
    formData.append('mobile_number', user.mobile_number);
    formData.append('login_type', "default");
    formData.append('device_id', "default");

    this.httpClient.post("http://nammamatrimony.in/user/register?",formData
   )
    .subscribe(
        (data:any) => {
            console.log("POST Request is successful ", data.User);

        },
        error => {
            console.log("Error", error.error);
        }
    );     
  }

  login(user:User) {
    const params = new HttpParams().set('email', user.email).set('password', user.password).set('login_type', user.login_type).set('device_id', user.device_id);
    this.httpClient.get("http://nammamatrimony.in/user/login",{params})
    .subscribe(
        data => {
            console.log("POST Request is successful ", data);
        },
        error => {
            console.log("Error", error);
        }
    );     
  }

}
