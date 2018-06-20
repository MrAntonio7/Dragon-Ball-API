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
     this._get_service.getById("characters/1", '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx').subscribe((resp: any) => {
      this.data = resp;
    },
     erro => {},
    () => {
      this.json = JSON.stringify(this.data.data, null, 2);
    });
  }

  change_input(data) {
    $('#basic-url').val(data + '?apikey=[YOUR_APIKEY]');
    this._get_service.getById(data, '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx').subscribe((resp: any) => {
      this.json = JSON.stringify(resp.data, null, 2);
    });
  }

  request() {
    let data = $('#basic-url').val();
    let link = data.split("?",1)
    this._get_service.getById(link, '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx').subscribe((resp: any) => {
      this.json = JSON.stringify(resp.data, null, 2);
    });
  }

}
