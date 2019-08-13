import { Injectable } from '@angular/core';
import { LocalStorage } from '@ngx-pwa/local-storage';
import { User } from '../home/User';

@Injectable({
  providedIn: 'root'
})
export class GlobalService {

isLogin=true; 

constructor(protected localStorage: LocalStorage) {

}

storeUser(user:User) {
  
}

setLogined(flag:boolean) {
  this.localStorage.setItem('isLogined', flag)
  .subscribe(
    (isLogined) => {
     this.isLogin = isLogined;
    }
  );
}

isLogined() {
  this.localStorage.getItem<boolean>('isLogined')
  .subscribe((isLogined:boolean) => {
    this.isLogin = isLogined;
  });
}

}
