import { Component, OnInit, NgModule } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { GetService } from '../get.service';
declare var $: any;
@Component({
  selector: 'app-new',
  templateUrl: './new.component.html',
  styleUrls: ['./new.component.css']
})
export class NewComponent implements OnInit {
  valor: any;
  tipo: any;
  controlador: any;

  constructor(private _router: Router, private _service_get: GetService, private _routerA: ActivatedRoute ) { }

  ngOnInit() {
    console.log('Ready to Create');
    this.tipo = this._routerA.snapshot.params['type'];
    this.controlador = this.tipo + "/";
  }

  create(data: NgForm) {
    console.log(data.value);
    this._service_get.create(this.controlador, '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx', data.value);
    this._service_get.value_respuesta_create.subscribe(resp => {
      if (resp) {
        $("#status-create").html(`<span class='letras-verdes'> <i class='fa fa-check'></i> Registry created correctly.</span>`);
      } else {
        $("#status-create").html(`<span class='letras-rojas'> <i class='fa fa-times'></i> Registry could not be created.</span>`);
      }
    });
  }

 volver() {
  location.href = 'https://dragonballapi.com/profile';
 }

}
