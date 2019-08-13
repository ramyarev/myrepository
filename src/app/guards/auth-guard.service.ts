import { Injectable } from '@angular/core';
import { Router, CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { GlobalService } from '../service/global.service';

@Injectable({ providedIn: 'root' })
export class AuthGuardService implements CanActivate {

    constructor(private router: Router,private gs:GlobalService) { }

    canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
      console.log(this.gs.isLogin);
        if (this.gs.isLogin) {
            // logged in so return true

            return true;
        }

        // not logged in so redirect to login page with the return url
        this.router.navigate(['/home']);
        return false;
    }
}