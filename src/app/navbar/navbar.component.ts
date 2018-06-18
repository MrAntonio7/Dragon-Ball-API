import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { SinginService } from '../singin.service';

declare var CryptoJS: any;

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  usuario: any;
  user_logueado: any;

  constructor(private _service: SinginService) {

   }

  ngOnInit() {
    if (localStorage.getItem('usuario') ) {
      this.usuario = (JSON.parse(CryptoJS.AES.decrypt(localStorage.getItem('usuario'), 'Usuario registrado by admin').toString(CryptoJS.enc.Utf8)));
      this._service.check_singin(this.usuario);
      this._service.value_status_user.subscribe(data => { this.user_logueado = data; });

    }

  }

}
