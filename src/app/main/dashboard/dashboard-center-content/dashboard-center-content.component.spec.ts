import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardCenterContentComponent } from './dashboard-center-content.component';

describe('DashboardCenterContentComponent', () => {
  let component: DashboardCenterContentComponent;
  let fixture: ComponentFixture<DashboardCenterContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashboardCenterContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardCenterContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
