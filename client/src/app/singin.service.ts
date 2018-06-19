import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';


@Injectable()
export class SinginService {

  private valueLoading = new Subject<any>();
  public value$ = this.valueLoading.asObservable();

  public respuesta: any;

  private status_user = new Subject<any>();
  public value_status_user = this.status_user.asObservable();

  private login_user = new Subject<any>();
  public value_login_user = this.login_user.asObservable();

  private rol_user = new Subject<any>();
  public value_rol_user = this.login_user.asObservable();

  constructor(public http: HttpClient) { }

  private getHeaders(): HttpHeaders {
    let headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    headers.append('Accept', 'application/json');
    headers.append('Content-Type', 'application/json');
    return headers;
  }

  setLoading(data) {
    this.valueLoading.next(data);
  }

  check_singin(user) {
    this.setLoading(false);
    this.http.post('https://dragonballapi.com/api/check_singin', user)
    .subscribe(
      (res: Response) => {
        this.respuesta = res;
      },
      err => {
        console.log('Error occured');
      },
      () => {
        this.setLoading(true);
        if (this.respuesta.status == 'OK') {
          this.status_user.next(true);
          this.login_user.next(this.respuesta);
          this.rol_user.next(this.respuesta.data.rol);
          return true;
        } else {
          this.status_user.next(false);
          return false;
        }

      }
    );
  }

}

