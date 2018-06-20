import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { RecaptchaModule } from 'ng-recaptcha';
import { RecaptchaFormsModule } from 'ng-recaptcha/forms';
import { HttpClientModule } from '@angular/common/http';
import { HttpClient } from 'selenium-webdriver/http';
import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { GetService } from './get.service';
import { SinginService } from './singin.service';
import { SingupService } from './singup.service';
import { NavbarComponent } from './navbar/navbar.component';
import { AppRoutingModule } from './/app-routing.module';
import { ROUTES } from './app-routing.module';
import { HomeComponent } from './home/home.component';
import { SinginComponent } from './singin/singin.component';
import { SingupComponent } from './singup/singup.component';
import { LoaderComponent } from './loader/loader.component';
import { AuthGuard } from './authconfirmeduser.guard';
import { RegisterConfirmedComponent } from './register-confirmed/register-confirmed.component';
import { UnauthorizedComponent } from './unauthorized/unauthorized.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { PerfilComponent } from './perfil/perfil.component';
import { ChangepasswordComponent } from './changepassword/changepassword.component';
import { FooterComponent } from './footer/footer.component';
import { SendemailService } from './sendemail.service';
import { AuthuserenterGuard } from './authuserenter.guard';
import { EditComponent } from './edit/edit.component';
import { EditForeingComponent } from './edit-foreing/edit-foreing.component';
import { RestadminGuard } from './restadmin.guard';
import { NewComponent } from './new/new.component';
import { DocumentacionComponent } from './documentacion/documentacion.component';
import { AboutComponent } from './about/about.component';
@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    HomeComponent,
    SinginComponent,
    SingupComponent,
    LoaderComponent,
    RegisterConfirmedComponent,
    UnauthorizedComponent,
    NotfoundComponent,
    PerfilComponent,
    ChangepasswordComponent,
    FooterComponent,
    EditComponent,
    EditForeingComponent,
    NewComponent,
    DocumentacionComponent,
    AboutComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RecaptchaModule.forRoot(),
    RecaptchaFormsModule,
    RouterModule.forRoot (ROUTES, {useHash: false})
  ],
  providers: [
    SinginService,
    SingupService,
    GetService,
    AuthGuard,
    SendemailService,
    AuthuserenterGuard,
    RestadminGuard

  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
