import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';

@Injectable()
export class SendemailService {
  private valueLoading = new Subject<any>();
  public value$ = this.valueLoading.asObservable();
  respuesta: any;

  private respuestaContacto = new Subject<any>();
  public value_respuesta_contacto = this.valueLoading.asObservable();

  constructor(public http: HttpClient) {

   }

   private getHeaders(): HttpHeaders {
    let headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    headers.append('Accept', 'application/json');
    headers.append('Content-Type', 'application/json');
    return headers;
  }

  setLoading(data) {
    this.valueLoading.next(data);
  }

  new_password(user) {
    this.setLoading(false);
    let header = this.getHeaders();
    this.http.post('https://dragonballapi.com/api/new_password', user, {headers: header})
    .subscribe(
      (res: Response) => {
        this.respuesta = res;
      },
      err => {
        console.log('Error occured');
        return false;
      },
      () => {
        this.setLoading(true);
        console.log(this.respuesta);
      }
    );
   }

   contacto(mensaje) {
    this.setLoading(false);
    let header = this.getHeaders();
    this.http.post('https://dragonballapi.com/api/send_message', mensaje, {headers: header})
    .subscribe(
      (res: Response) => {
        this.respuesta = res;
      },
      err => {
        console.log('Error occured');
        return false;
      },
      () => {
        this.setLoading(true);
        this.respuestaContacto.next(true);
      }
    );
   }
}
