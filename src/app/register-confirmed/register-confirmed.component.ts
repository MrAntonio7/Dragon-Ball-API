import { Component, OnInit } from '@angular/core';
import { SingupService } from '../singup.service';

@Component({
  selector: 'app-register-confirmed',
  templateUrl: './register-confirmed.component.html',
  styleUrls: ['./register-confirmed.component.css']
})
export class RegisterConfirmedComponent implements OnInit {

  constructor(private _servicio: SingupService) { }

  ngOnInit() {

  }

}
