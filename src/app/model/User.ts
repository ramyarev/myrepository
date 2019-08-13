export class User {
    name:string;
    email: string;
    password: string;
    mobile_number: string;
    profile_created_for:string;
    login_type: string;
    constructor(user?: Partial<User>){
        if(!!user){
            this.name = user.name;
            this.email = user.email;
            this.password = user.password;
            this.mobile_number = user.mobile_number;
            this.profile_created_for = user.profile_created_for;
            this.login_type = user.login_type;
        }else{
            this.name = "",
            this.email  = "",
            this.password = "" ,
            this.mobile_number = "",
            this.profile_created_for = "",
            this.login_type = "0"
        }
    }
  }