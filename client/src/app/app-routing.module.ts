import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { SinginComponent } from './singin/singin.component';
import { SingupComponent } from './singup/singup.component';
import { RegisterConfirmedComponent } from './register-confirmed/register-confirmed.component';
import { AuthGuard } from './authconfirmeduser.guard';
import { UnauthorizedComponent } from './unauthorized/unauthorized.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { PerfilComponent } from './perfil/perfil.component';
import { AuthuserenterGuard } from './authuserenter.guard';
import { ChangepasswordComponent } from './changepassword/changepassword.component';
import { EditComponent } from './edit/edit.component';
import { EditForeingComponent } from './edit-foreing/edit-foreing.component';
import { RestadminGuard } from './restadmin.guard';
import { NewComponent } from './new/new.component';
import { DocumentacionComponent } from './documentacion/documentacion.component';
import { AboutComponent } from './about/about.component';

export const ROUTES: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'change_password', component: ChangepasswordComponent },
  { path: 'about', component: AboutComponent },
  { path: 'documentation', component: DocumentacionComponent },
  { path: 'singin', component: SinginComponent },
  { path: 'singup', component: SingupComponent },
  { path: 'profile', component: PerfilComponent, canActivate: [AuthuserenterGuard] },
  { path: 'new/:type', component: NewComponent, canActivate: [RestadminGuard] },
  { path: 'edit/:type/:id', component: EditComponent, canActivate: [RestadminGuard] },
  { path: 'edit_foreing/:type/:id/:id2', component: EditForeingComponent, canActivate: [RestadminGuard] },
  { path: 'confirmation_register', component: RegisterConfirmedComponent, canActivate: [AuthGuard] },
  { path: 'unauthorized', component: UnauthorizedComponent },
  { path: '', pathMatch: 'full', redirectTo: 'home'},
  { path: '**', pathMatch: 'full', component: NotfoundComponent}
];

@NgModule({
  imports: [
    CommonModule
  ],
  exports: [ RouterModule ],
  declarations: []
})

export class AppRoutingModule { }
