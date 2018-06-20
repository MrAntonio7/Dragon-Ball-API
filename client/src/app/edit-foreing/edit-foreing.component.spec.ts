import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditForeingComponent } from './edit-foreing.component';

describe('EditForeingComponent', () => {
  let component: EditForeingComponent;
  let fixture: ComponentFixture<EditForeingComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditForeingComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditForeingComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
