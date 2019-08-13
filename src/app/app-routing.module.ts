import { MatchesComponent } from './main/matches/matches.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ProfileDetailComponent } from './profile-detail/profile-detail.component';
import { AuthenticationService } from './home/authentication.service';
import { AuthGuardService } from './guards/auth-guard.service';
import { UserUpdateComponent } from './user-update/user-update.component';
import { OtpComponent } from './otp/otp.component';
import { ShareIdentityComponent } from './share-identity/share-identity.component';
import { UploadPhotoComponent } from './upload-photo/upload-photo.component';
import { MainComponent } from './main/main.component';
import { DashboardComponent } from './main/dashboard/dashboard.component';
// import { PartnerPreferenceComponent } from './main/partner-preference/partner-preference.component';
import { RegistrationComponent } from './registration/registration.component';
import { PackageComponent } from './package/package.component';
import { ConversationComponent } from './main/conversation/conversation.component';
import { NotificationComponent } from './main/notification/notification.component';
import { ProfileComponent } from './user/profile/profile.component';
import { UserDetailComponent } from './user/user-detail/user-detail.component';
import { VerificationComponent } from './user/verification/verification.component';
import { BasicDetailsComponent } from './user-update/basic-details/basic-details.component';
import { PrimaryDetailsComponent } from './user/primary-details/primary-details.component';
import { EducationComponent } from './user/education/education.component';
import { FamilyComponent } from './user/family/family.component';
import { UploadImageComponent } from './user/upload-image/upload-image.component';
import { UserIdentityComponent } from './user/user-identity/user-identity.component';
import { PartnerPreferenceComponent } from './user/partner-preference/partner-preference.component';
import { ReligionComponent } from './user/religion/religion.component';

const routes: Routes = [
  {
    path: '', component: HomeComponent,
    // children:[
    // { path: 'detail', component: ProfileDetailComponent,canActivate:[AuthGuardService]}
    //] 
  },
  //   { path: 'userupdate', component: UserUpdateComponent },
  //   { path: 'register', component: RegistrationComponent },
  //   { path: 'otp', component: OtpComponent },
  //   { path: 'share-identity', component: ShareIdentityComponent },
  //   { path: 'upload-photo', component: UploadPhotoComponent },
  //   { path: 'main', component: MainComponent,
  //   children:[
  //     { path: 'dashboard', component: DashboardComponent},
  //     { path: 'preference', component: PartnerPreferenceComponent},
  //     { path: 'package', component: PackageComponent},
  //     { path: 'userupdate', component: UserUpdateComponent },
  //     { path: 'chats', component: ConversationComponent},
  //     { path: 'notifications', component: NotificationComponent}
  //   ] 
  // },
  {
    path: 'profile', component: ProfileComponent,
    children: [
      { path: 'details/:id', component: UserDetailComponent },
      { path: 'verification/:id', component: VerificationComponent },
      { path: 'basic/:id', component: PrimaryDetailsComponent },
      { path: 'education/:id', component: EducationComponent },
      { path: 'family/:id', component: FamilyComponent },
      { path: 'imageUpload/:id', component: UploadImageComponent },
      { path: 'identity/:id', component: UserIdentityComponent },
      { path: 'preference/:id', component: PartnerPreferenceComponent }
    ]
  },
  {
    path: 'education', component: EducationComponent
  },
  {
    path: 'religion', component: ReligionComponent
  },
  {
    // path: 'dashboard/:id', component: DashboardComponent
    path: 'dashboard', component: DashboardComponent
  },
  {
    // path: 'dashboard/:id', component: DashboardComponent
    path: 'matches', component: MatchesComponent,
  },
  { path: '**', redirectTo: '', pathMatch: 'full' },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
