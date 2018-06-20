import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';
@Injectable()
export class GetService {
  private respuesta_update = new Subject<any>();
  public value_respuesta_update = this.respuesta_update.asObservable();
  private respuesta_create = new Subject<any>();
  public value_respuesta_create = this.respuesta_create.asObservable();
  private valueLoading = new Subject<any>();
  public value$ = this.valueLoading.asObservable();
  respuesta: any;
  constructor(public http: HttpClient) { }
  setLoading(data) {
    this.valueLoading.next(data);
  }

  private getHeaders(): HttpHeaders {
    let headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    headers.append('Accept', 'application/json');
    headers.append('Content-Type', 'application/json');
    return headers;
  }
    getPersonajes(apikey) {
      let url = `https://dragonballapi.com/api/characters` + '?apikey=' + apikey;
      let header = this.getHeaders();
      return this.http.get(url, { responseType: 'json' });
    }
    getById(data, apikey) {
      let url = `https://dragonballapi.com/api/` + data + '?apikey=' + apikey;
      let header = this.getHeaders();
      return this.http.get(url, { responseType: 'json' });
    }

    gettables(apikey) {
      let url = `https://dragonballapi.com/api/tables` + '?apikey=' + apikey;
      let header = this.getHeaders();
      return this.http.get(url, { responseType: 'json' });
    }

    update(controlador, parametros, apikey, data) {
      let url = 'https://dragonballapi.com/api/' + controlador + 'put/' + parametros + '?apikey=' + apikey;
      this.setLoading(false);
      this.http.post(url, data)
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
            this.respuesta_update.next(true);
            return true;
          } else {
            this.respuesta_update.next(false);
            return false;
          }
        }
      );
    }

    create(controlador, apikey, data) {
      let url = 'https://dragonballapi.com/api/' + controlador + 'post' + '?apikey=' + apikey;
      this.setLoading(false);
      this.http.post(url, data)
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
            this.respuesta_create.next(true);
            return true;
          } else {
            this.respuesta_create.next(false);
            return false;
          }
        }
      );
    }

    borrar(controlador, parametro, apikey) {
      let url = 'https://dragonballapi.com/api/' + controlador + '/delete/' + parametro + '?apikey=' + apikey;
      this.setLoading(false);
      this.http.get(url)
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
            this.respuesta_create.next(true);
            window.location.href = "https://dragonballapi.com/profile";
            return true;
          } else {
            this.respuesta_create.next(false);
            return false;
          }
        }
      );
    }

}
