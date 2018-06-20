import { Component, OnInit } from '@angular/core';
import { SingupService } from '../singup.service';
import { SinginService } from '../singin.service';
import { SendemailService } from '../sendemail.service';
import { GetService } from '../get.service';

@Component({
  selector: 'app-loader',
  templateUrl: './loader.component.html',
  styleUrls: ['./loader.component.css']
})
export class LoaderComponent implements OnInit {
  loading: boolean = true;
  constructor(private _service: SingupService, private _service2: SinginService, private _service3: SinginService, private _service4: GetService) { }

  ngOnInit() {
    this._service.value$.subscribe(data => {this.loading = data; }
    );
    this._service2.value$.subscribe(data => {this.loading = data; }
    );
    this._service3.value$.subscribe(data => {this.loading = data; }
    );
    this._service4.value$.subscribe(data => {this.loading = data; }
    );
  }

}
