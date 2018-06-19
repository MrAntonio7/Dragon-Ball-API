import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';
@Injectable()
export class GetService {

  constructor(public http: HttpClient) { }
  private getHeaders(): HttpHeaders {
    let headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    headers.append('Accept', 'application/json');
    headers.append('Content-Type', 'application/json');
    return headers;
  }
  getPersonajes(apikey) {
    let url = `https://dragonballapi.com/api/characters` + '?apikey=' + apikey;
    let header = this.getHeaders();
    return this.http.get(url, { responseType: 'json' });
    }
  getPersonajeById(data, apikey) {
    console.log(`https://dragonballapi.com/api/` + data + '?apikey=' + apikey);
      let url = `https://dragonballapi.com/api/` + data + '?apikey=' + apikey;
      let header = this.getHeaders();
      return this.http.get(url, { responseType: 'json' });
    }
}
