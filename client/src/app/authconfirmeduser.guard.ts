import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { SingupService } from './singup.service';

@Injectable()
export class AuthGuard implements CanActivate {
  constructor(private _router: Router, private _service: SingupService) {

  }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
      if (this._service.autorizacion == 'Usuario registrado by admin') {
        return true;
      } else {
        this._router.navigate(['/unauthorized']);
      }

  }
}
