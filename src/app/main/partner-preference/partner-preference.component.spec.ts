import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PartnerPreferenceComponent } from './partner-preference.component';

describe('PartnerPreferenceComponent', () => {
  let component: PartnerPreferenceComponent;
  let fixture: ComponentFixture<PartnerPreferenceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PartnerPreferenceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PartnerPreferenceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
