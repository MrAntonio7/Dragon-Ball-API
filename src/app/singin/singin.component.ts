import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { SinginService } from '../singin.service';
import { RecaptchaModule } from 'ng-recaptcha';
import { RecaptchaFormsModule } from 'ng-recaptcha/forms';
import { Router } from '@angular/router';
declare var CryptoJS: any;
declare var $: any;

export interface FormModel {
  captcha?: string;
}

@Component({
  selector: 'app-singin',
  templateUrl: './singin.component.html',
  styleUrls: ['./singin.component.css']
})
export class SinginComponent implements OnInit {
  usuario: Usuario;
  buttonStatus: boolean;
  user_logueado: any;
  constructor(private _service: SinginService, private _router: Router) {

  }

  ngOnInit() {
    this.buttonStatus = false;

  }

  resolved(captchaResponse: string) {
    if (captchaResponse == null) {
      this.buttonStatus = false;
    } else {
      this.buttonStatus = true;
    }
}
  comprobar_usuario(datos: NgForm) {
    this._service.check_singin(datos.value);
    this._service.value_status_user.subscribe(data => { if (data) {
      this._service.value_login_user.subscribe(data_ => {
        localStorage.setItem('usuario', CryptoJS.AES.encrypt(JSON.stringify(data_.data), 'Usuario registrado by admin'));
      });
      location.href = window.location.protocol + "//" + window.location.host + "/" + "home";
    } else {
      $('#status-login').html(`<span class="letras-rojas">
      <i class="fa fa-times"></i> Your username or password invalid.</span>`);
    }
   });
  }

}


interface Usuario {
  user: string;
  password: string;

}
