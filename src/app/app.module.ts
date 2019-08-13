import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { MatMenuModule } from '@angular/material/menu';
import { MatBadgeModule } from '@angular/material/badge';
import { MatFormFieldModule } from '@angular/material/form-field';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { StoriesComponent } from './stories/stories.component';
import { SwiperModule } from 'angular2-useful-swiper';
import { RecentlyJoinedComponent } from './recently-joined/recently-joined.component';
import { FeaturesComponent } from './features/features.component';
import { PrivacyComponent } from './privacy/privacy.component';
import { AppLinkComponent } from './app-link/app-link.component';
import { FooterComponent } from './footer/footer.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BsDatepickerModule } from 'ngx-bootstrap';
import { HttpClientModule } from '@angular/common/http';
import { ProfileDetailComponent } from './profile-detail/profile-detail.component';
import { UserUpdateComponent } from './user-update/user-update.component';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { OtpComponent } from './otp/otp.component';
import { ShareIdentityComponent } from './share-identity/share-identity.component';
import { AngularFileUploaderModule } from 'angular-file-uploader';
import { UploadPhotoComponent } from './upload-photo/upload-photo.component';
import { MainComponent } from './main/main.component';
import { DashboardComponent } from './main/dashboard/dashboard.component';
// import { PartnerPreferenceComponent } from './main/partner-preference/partner-preference.component';
import { AdditionalFeaturesComponent } from './additional-features/additional-features.component';
import { ShortlistedComponent } from './main/dashboard/shortlisted/shortlisted.component';
import { ConnectionsComponent } from './main/dashboard/connections/connections.component';
import { InterestComponent } from './main/dashboard/interest/interest.component';
import { ProfileviewsComponent } from './main/dashboard/profileviews/profileviews.component';
import { RegistrationComponent } from './registration/registration.component';
import { BasicDetailsComponent } from './user-update/basic-details/basic-details.component';
import { EducationDetailsComponent } from './user-update/education-details/education-details.component';
import { FamilyDetailsComponent } from './user-update/family-details/family-details.component';
import { PackageComponent } from './package/package.component';
import { ConversationComponent } from './main/conversation/conversation.component';
import { NotificationComponent } from './main/notification/notification.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatButtonModule, MatCheckboxModule, MatPaginatorModule } from '@angular/material';
import { MatSelectModule } from '@angular/material/select';
import { SignupComponent } from './signup/signup.component';
import { LoginComponent } from './login/login.component';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDividerModule } from '@angular/material/divider';
import { ProfileComponent } from './user/profile/profile.component';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatCardModule } from '@angular/material/card';
import { UserDetailComponent } from './user/user-detail/user-detail.component';
import { DatepickerModule } from 'ngx-bootstrap/datepicker';
import { VerificationComponent } from './user/verification/verification.component';
import { PrimaryDetailsComponent } from './user/primary-details/primary-details.component';
import { EducationComponent } from './user/education/education.component';
import { FamilyComponent } from './user/family/family.component';
import { UploadImageComponent } from './user/upload-image/upload-image.component';
import { UserIdentityComponent, AlertDialog } from './user/user-identity/user-identity.component';
import { MatTabsModule } from '@angular/material/tabs';
import { MatIconModule } from '@angular/material/icon';
import { NgxHmCarouselModule } from 'ngx-hm-carousel';



import { PartnerPreferenceComponent } from './user/partner-preference/partner-preference.component';
import { DashboardToolbarComponent } from './main/dashboard/dashboard-toolbar/dashboard-toolbar.component';
import { DashboardSectionComponent } from './main/dashboard/dashboard-section/dashboard-section.component';
import {
  DashboardInboxLeftSideContentComponent
} from './main/dashboard/dashboard-inbox-left-side-content/dashboard-inbox-left-side-content.component';
import {
  DashboardDiscoverLeftSideContentComponent
} from './main/dashboard/dashboard-discover-left-side-content/dashboard-discover-left-side-content.component';
import {
  DashboardSearchRightSideContentComponent
} from './main/dashboard/dashboard-search-right-side-content/dashboard-search-right-side-content.component';
import { GlobalService } from './service/global.service';
import { AuthenticationService } from './home/authentication.service';
import { UserService } from './service/user.service';
import { LoginService } from './service/login.service';
import { FileSelectDirective } from 'ng2-file-upload';
import { CarouselHolderComponent } from './main/dashboard/carousel-holder/carousel-holder.component';
import { DashboardCenterContentComponent } from './main/dashboard/dashboard-center-content/dashboard-center-content.component';
import { CardFooterIconComponent } from './main/dashboard/card-footer-icon/card-footer-icon.component';
import { MatchesViewComponent } from './main/matches-view/matches-view.component';
import { TodayMatchesListComponent } from './main/matches-view/today-matches-list/today-matches-list.component';
import { PremiumMatchesListComponent } from './main/matches-view/premium-matches-list/premium-matches-list.component';
import {
  RecommendationsMatchesListComponent
} from './main/matches-view/recommendations-matches-list/recommendations-matches-list.component';
import { NearByMeMatchesListComponent } from './main/matches-view/near-by-me-matches-list/near-by-me-matches-list.component';
import { MatchesComponent } from './main/matches/matches.component';
import { MatchesCenterContentComponent } from './main/matches/matches-center-content/matches-center-content.component';
import { MatchesLeftSideContentComponent } from './main/matches/matches-left-side-content/matches-left-side-content.component';
import { MatchesRightSideContentComponent } from './main/matches/matches-right-side-content/matches-right-side-content.component';
import { MatchesSectionComponent } from './main/matches/matches-section/matches-section.component';
import { MatchesListContentComponent } from './main/matches/matches-list-content/matches-list-content.component';
import { ReligionComponent } from './user/religion/religion.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    StoriesComponent,
    RecentlyJoinedComponent,
    FeaturesComponent,
    PrivacyComponent,
    AppLinkComponent,
    FooterComponent,
    ProfileDetailComponent,
    UserUpdateComponent,
    OtpComponent,
    ShareIdentityComponent,
    UploadPhotoComponent,
    MainComponent,
    DashboardComponent,
    PartnerPreferenceComponent,
    AdditionalFeaturesComponent,
    ShortlistedComponent,
    ConnectionsComponent,
    InterestComponent,
    ProfileviewsComponent,
    RegistrationComponent,
    BasicDetailsComponent,
    EducationDetailsComponent,
    FamilyDetailsComponent,
    PackageComponent,
    ConversationComponent,
    NotificationComponent,
    SignupComponent,
    LoginComponent,
    ProfileComponent,
    UserDetailComponent,
    VerificationComponent,
    PrimaryDetailsComponent,
    EducationComponent,
    FamilyComponent,
    UploadImageComponent,
    UserIdentityComponent,
    DashboardToolbarComponent,
    AlertDialog,
    DashboardSectionComponent,
    DashboardInboxLeftSideContentComponent,
    DashboardDiscoverLeftSideContentComponent,
    DashboardSearchRightSideContentComponent,
    CarouselHolderComponent,
    DashboardCenterContentComponent,
    CardFooterIconComponent,
    MatchesViewComponent,
    TodayMatchesListComponent,
    PremiumMatchesListComponent,
    RecommendationsMatchesListComponent,
    NearByMeMatchesListComponent,
    MatchesComponent,
    MatchesCenterContentComponent,
    MatchesLeftSideContentComponent,
    MatchesRightSideContentComponent,
    MatchesSectionComponent,
    MatchesListContentComponent,
    ReligionComponent,
  ],
  imports: [
    BsDatepickerModule.forRoot(),
    BrowserModule,
    AppRoutingModule,
    SwiperModule,
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    AngularFileUploaderModule,
    BsDropdownModule.forRoot(),
    BrowserAnimationsModule,
    DatepickerModule.forRoot(),
    MatButtonModule,
    MatCheckboxModule,
    MatSelectModule,
    MatDialogModule,
    MatDividerModule,
    MatToolbarModule,
    MatCardModule,
    MatTabsModule,
    MatIconModule,
    MatMenuModule,
    MatBadgeModule,
    MatFormFieldModule,
    MatPaginatorModule,
    NgxHmCarouselModule,
  ],
  entryComponents: [LoginComponent, SignupComponent, AlertDialog],
  providers: [GlobalService, AuthenticationService, LoginService, UserService],
  bootstrap: [AppComponent]
})
export class AppModule { }
