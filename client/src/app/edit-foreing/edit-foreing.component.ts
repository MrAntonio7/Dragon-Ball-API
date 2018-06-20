import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { GetService } from '../get.service';
declare var $: any;
@Component({
  selector: 'app-edit-foreing',
  templateUrl: './edit-foreing.component.html',
  styleUrls: ['./edit-foreing.component.css']
})
export class EditForeingComponent implements OnInit {
  valor: any;
  tipo: any;
  id: any;
  id2: any;
  link: any;
  controlador: any;
  parametros: any;

  constructor(private _router: Router, private _service_get: GetService, private _routerA: ActivatedRoute ) { }

  ngOnInit() {
    console.log('Ready to Update');
    this.tipo = this._routerA.snapshot.params['type'];
    this.id = this._routerA.snapshot.params['id'];
    this.id2 = this._routerA.snapshot.params['id2'];
    this.controlador = this.tipo + "/";
    this.parametros = this.id + "/" + this.id2;
    this.link = this.controlador + this.parametros;
    this._service_get.getById(this.link, '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx').subscribe((resp: any) => {
      this.valor = resp.data[0];
    });
  }

  update(data) {
    this._service_get.update(this.controlador, this.parametros, '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx', data.value);
    this._service_get.value_respuesta_update.subscribe(resp => {
      if (resp) {
        $("#status-update").html(`<span class='letras-verdes'> <i class='fa fa-check'></i> Registry updated correctly.</span>`);
      } else {
        $("#status-update").html(`<span class='letras-rojas'> <i class='fa fa-times'></i> Registry could not be updated.</span>`);
      }
    });
  }

 volver() {
  location.href = 'https://dragonballapi.com/profile';
 }

}
