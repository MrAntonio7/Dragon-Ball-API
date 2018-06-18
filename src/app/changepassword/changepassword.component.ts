import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { SingupService } from '../singup.service';
import { RecaptchaModule } from 'ng-recaptcha';
import { RecaptchaFormsModule } from 'ng-recaptcha/forms';
import { SendemailService } from '../sendemail.service';

declare var $: any;

@Component({
  selector: 'app-changepassword',
  templateUrl: './changepassword.component.html',
  styleUrls: ['./changepassword.component.css']
})
export class ChangepasswordComponent implements OnInit {

  loading: boolean;
  buttonStatus: boolean;
  sent_password: boolean;

  constructor(private _servicio: SingupService, private _servicio_correo: SendemailService) {
    this._servicio.value$.subscribe(data => {this.loading = data; });
    this.buttonStatus = false;
    this.sent_password = false;
   }

  ngOnInit() {

  }
  resolved(captchaResponse: string) {
    if (captchaResponse == null) {
      this.buttonStatus = false;
    } else {
      this.buttonStatus = true;
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
  comprobar_usuario (datos: NgForm) {
    $('#status-email').html('');
    if (this.test_string_email(datos.value.email)) {
      this._servicio.check_email_singup(datos.value);
      this._servicio.value_cadena_email.subscribe(data => {
      // console.log(datos.value);
        if (data != "<span class='letras-verdes'> <i class='fa fa-check'></i> Your email address is valid.</span>"){
          this.sent_password = true;
          this._servicio_correo.new_password(datos.value);
        } else {
          $('#status-email').html("<span class='letras-rojas'> <i class='fa fa-times'></i> This email address is not registered. Please enter your email address.</span>");
          this.sent_password = false;
        }
      } );
    }
  }
}
