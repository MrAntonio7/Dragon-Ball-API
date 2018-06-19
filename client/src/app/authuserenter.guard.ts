import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { SinginService } from './singin.service';
declare var CryptoJS: any;

@Injectable()
export class AuthuserenterGuard implements CanActivate {
  pass: any;
  rol: any;

  constructor(private _router: Router, private _service: SinginService) {

  }
  canActivate(

    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
       if (localStorage.getItem('usuario')) {
        return true;
      } else {
        this._router.navigate(['/singin']);
      }

  }
}
