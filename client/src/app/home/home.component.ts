import { Component, OnInit } from '@angular/core';
import { Console } from '@angular/core/src/console';
import { GetService } from '../get.service';
declare var CryptoJS: any;
declare var $: any;
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  data: any;

  value_input: any;
  json: any;
  constructor(private _get_service: GetService) { }

  ngOnInit() {
    $("#basic-url").val("characters/1?apikey=[YOUR_APIKEY]");
     this._get_service.getPersonajeById("characters/1", 'C93CCD78B2076528346216B3B2F701E6').subscribe((resp: any) => {
      this.data = resp;
    },
     erro => {},
    () => {
      this.json = JSON.stringify(this.data.data, null, 2);
      console.log(this.json);
    });
  }

  change_input(data) {
    $('#basic-url').val(data + '?apikey=[YOUR_APIKEY]');
    this._get_service.getPersonajeById(data, 'C93CCD78B2076528346216B3B2F701E6').subscribe((resp: any) => {
      this.json = JSON.stringify(resp.data, null, 2);
    });
  }

}
