import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { User } from '../model/User';


@Injectable()
export class LoginService {
    constructor(
        private http: HttpClient,
        ) { }

          signup (user: User) {
            return this.http.post(environment.backend_url+ "signup.php",JSON.stringify(user))
              }
}