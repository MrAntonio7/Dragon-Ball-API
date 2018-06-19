
import { SinginService } from '../singin.service';
import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { SendemailService } from '../sendemail.service';
declare var $: any;
declare var CryptoJS: any;

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit {
  usuario: any;
  var_hidden: any;
  confirmed_message: any = false;
  constructor(private _service: SinginService, private _service_correo: SendemailService) {

  }

  ngOnInit() {
    this.var_hidden = true;
    if (localStorage.getItem('usuario')) {
      this.usuario = (JSON.parse(CryptoJS.AES.decrypt(localStorage.getItem('usuario'), 'Usuario registrado by admin').toString(CryptoJS.enc.Utf8)));
    }

  }

  visible_key() {
    if (this.var_hidden) {
      this.var_hidden = false;
    } else {
      this.var_hidden = true;
    }
  }

  contacto(mensaje: NgForm) {
    let correo = {
      email: this.usuario.email,
      subject: mensaje.value.subject,
      text: mensaje.value.text,
    };
    this._service_correo.contacto(correo);
    this._service_correo.value_respuesta_contacto.subscribe(data => {
        $("#status-contacto").html(`<span class="letras-verdes">
        <i class="fa fa-check"></i>Your email has been sent correctly. We will respond as soon as possible.</span>`);
        this.confirmed_message = true;
    });
  }

  singout() {
    localStorage.removeItem("usuario");
    location.href = 'https://dragonballapi.com/';
  }

}
