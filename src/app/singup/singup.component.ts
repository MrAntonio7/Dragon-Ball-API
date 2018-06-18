
import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { SingupService } from '../singup.service';
import { RecaptchaModule } from 'ng-recaptcha';
import { RecaptchaFormsModule } from 'ng-recaptcha/forms';

declare var $: any;

@Component({
  selector: 'app-singup',
  templateUrl: './singup.component.html',
  styleUrls: ['./singup.component.css']
})
export class SingupComponent implements OnInit {
  usuario: Usuario;
  loading: boolean;
  buttonStatus: boolean;
  contador = 0;
  constructor(private _servicio: SingupService) { }

  ngOnInit() {
    this._servicio.value$.subscribe(data => {this.loading = data; });
    this.buttonStatus = false;


  }
  resolved(captchaResponse: string) {
    if (captchaResponse == null) {
      this.buttonStatus = false;
    } else {
      this.buttonStatus = true;
    }

}

  test_string_username(username) {
    if (/^[a-z0-9_-]{3,15}/.test(username)) {
      return true;
    } else {
      $('#status-username').html(`<span class="letras-rojas">
      <i class="fa fa-times"></i> Your username is invalid. Please enter a valid username.</span>`);
      return false;
    }
  }

  test_string_email(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      return true;
    } else {
      $('#status-email').html(`<span class="letras-rojas">
      <i class="fa fa-times"></i> Your email address is invalid. Please enter a valid address.</span>`);
      return false;
    }
  }

  test_password(password, conf_pass) {
    if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
      if (password == conf_pass) {
        return 'Pass confirmed';
      } else {
        return `<span class="letras-rojas"><i class="fa fa-times"></i> Passwords do not match. </span>`;
      }
    } else {
      return `<span class="letras-rojas"><i class="fa fa-times"></i> Your password is invalid. Minimum eight characters, at least one letter and one number</span>`;
    }
  }

  comprobar_usuario(datos: NgForm) {

    $('#status-email').html('');
    $('#status-username').html('');
    $('#status-password').html('');

      // USERNAME
      if (this.test_string_username(datos.value.username)) {
        this._servicio.check_username_singup(datos.value);
        this._servicio.value_cadena_username.subscribe(data => {
          $('#status-username').html(data);

      // EMAIL
      if (data == "<span class='letras-verdes'> <i class='fa fa-check'></i> Your username address is valid.</span>"){
          if (this.test_string_email(datos.value.email)) {
            this._servicio.check_email_singup(datos.value);
            this._servicio.value_cadena_email.subscribe(data_ => {
              $('#status-email').html(data_);
      // PASSWORD
              if (data_ == "<span class='letras-verdes'> <i class='fa fa-check'></i> Your email address is valid.</span>") {
              let responsePassword = this.test_password(datos.value.password, datos.value.password2);
              if ( responsePassword == 'Pass confirmed') {
                let registrar_usuario = {
                  user: datos.value,
                  token: 'Usuario valido para registrar'
                };
                if (data == "<span class='letras-verdes'> <i class='fa fa-check'></i> Your username address is valid.</span>" && data_ == "<span class='letras-verdes'> <i class='fa fa-check'></i> Your email address is valid.</span>" && this.contador < 1){
                this._servicio.post_user(registrar_usuario);
                this.contador = 1;
               }
              } else {
                $('#status-password').html(responsePassword);
              }}
              });
            }}
        });
      }
    }

  }

interface Usuario {
  username: string;
  email: string;
  password: string;
  conf_pass: string;

}

