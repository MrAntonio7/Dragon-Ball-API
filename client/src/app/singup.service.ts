import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';
declare var CryptoJS: any;
@Injectable()
export class SingupService {
  private valueLoading = new Subject<any>();
  public value$ = this.valueLoading.asObservable();

  private cadena_statusEmail = new Subject<any>();
  public value_cadena_email = this.cadena_statusEmail.asObservable();

  private cadena_statusUsername = new Subject<any>();
  public value_cadena_username = this.cadena_statusUsername.asObservable();


  public respuesta_username: any;
  public respuesta_email: any;
  public respuesta_usuario: any;
  public autorizacion: any;
  constructor(public http: HttpClient, private _router: Router) { }

  private getHeaders(): HttpHeaders {
    let headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    headers.append('Accept', 'application/json');
    headers.append('Content-Type', 'application/json');
    return headers;
  }


  setLoading(data) {
    this.valueLoading.next(data);
  }

  check_email_singup(user) {
    this.setLoading(false);
    let header = this.getHeaders();
    this.http.post('https://dragonballapi.com/api/check_email', user, {headers: header})
    .subscribe(
      (res: Response) => {
        this.respuesta_email = res;
      },
      err => {
        console.log('Error occured');
        return false;
      },
      () => {
        let respuesta = JSON.parse(JSON.stringify(this.respuesta_email));
        this.setLoading(true);
        let cadena: string;
        for (let i = 0; i < respuesta.emails.length; i++) {
          if (user.email == respuesta.emails[i].email) {
            cadena = "<span class='letras-rojas'> <i class='fa fa-times'></i> Your email address is registered. Please enter a valid address.</span>";
            this.cadena_statusEmail.next(cadena);
            break;
          } else {
            cadena = "<span class='letras-verdes'> <i class='fa fa-check'></i> Your email address is valid.</span>";
            this.cadena_statusEmail.next(cadena);
          }
        }
      }
    );
   }

   check_username_singup(user) {
    this.setLoading(false);
    let header = this.getHeaders();
    this.http.post('https://dragonballapi.com/api/check_username', user, {headers: header})
    .subscribe(
      (res: Response) => {
        this.respuesta_username = res;
      },
      err => {
        console.error('Error occured');
        return false;
      },
      () => {
        let respuesta = JSON.parse(JSON.stringify(this.respuesta_username));
        this.setLoading(true);
        let cadena: string;
        for (let i = 0; i < respuesta.usernames.length; i++) {
          if (user.username == respuesta.usernames[i].username){
            cadena = "<span class='letras-rojas'> <i class='fa fa-times'></i> Your username is taken. Please enter a valid username.</span>";
            this.cadena_statusUsername.next(cadena);
            break;
          } else {
            cadena = "<span class='letras-verdes'> <i class='fa fa-check'></i> Your username address is valid.</span>";
            this.cadena_statusUsername.next(cadena);
            
          }
        }
      }
    );
   }

   post_user (user) {
      this.setLoading(false);
      let header = this.getHeaders();
      this.http.post('https://dragonballapi.com/api/register_user', user, {headers: header})
      .subscribe(
        (res: Response) => {
          this.respuesta_usuario = res;
        },
        err => {
          console.error('Error occured');
          return false;
        },
        () => {
          if (this.respuesta_usuario.statusCode == '401') {
            this._router.navigate(['/unauthorized']);
          } else {
          this.setLoading(true);
          this.autorizacion = this.respuesta_usuario.masterkey;

          localStorage.setItem('usuario', CryptoJS.AES.encrypt(JSON.stringify(this.respuesta_usuario.data), this.respuesta_usuario.masterkey));
          this._router.navigate(['/confirmation_register']);
        }}
      );
   }

}



