import { Component, OnInit, NgModule } from '@angular/core';
import { GetService } from '../get.service';
import { NgForm } from '@angular/forms';


@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})

export class FormularioComponent implements OnInit {

  personaje: Personaje;
  constructor(private _servicio: GetService) { }

  ngOnInit() {
      this._servicio.getPersonajes('C93CCD78B2076528346216B3B2F701E6').subscribe((resp: any) => {
      this.personaje  = resp.data[0];
    });
  }
  generar (datos: NgForm) {
    console.log(datos.value);
  }

}

interface Personaje {
  id_character: number;
  name: string;
  race: number;
  gener: string;
  img: string;
  weight: number;
  height: number;
  birth: string;
  dead: string;
  resurrection: string;
  job: string;
  alliances: string;
  description: string;
}
