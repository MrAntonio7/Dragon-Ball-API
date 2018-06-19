import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RegisterConfirmedComponent } from './register-confirmed.component';

describe('RegisterConfirmedComponent', () => {
  let component: RegisterConfirmedComponent;
  let fixture: ComponentFixture<RegisterConfirmedComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RegisterConfirmedComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RegisterConfirmedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
