import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs/Observable';
declare var CryptoJS: any;
@Injectable()
export class RestadminGuard implements CanActivate {
  constructor(private _router: Router) {

  }
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
      if (localStorage.getItem('usuario')) {
        let usuario = JSON.parse(CryptoJS.AES.decrypt(localStorage.getItem('usuario'), 'Usuario registrado by admin').toString(CryptoJS.enc.Utf8));
        if (usuario.rol == "admin"){
          return true;
        }
      } else {
        this._router.navigate(['/unauthorized']);
      }
  }
}
