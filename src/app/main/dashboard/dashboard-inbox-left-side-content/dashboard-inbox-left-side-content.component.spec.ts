import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardInboxLeftSideContentComponent } from './dashboard-inbox-left-side-content.component';

describe('DashboardInboxLeftSideContentComponent', () => {
  let component: DashboardInboxLeftSideContentComponent;
  let fixture: ComponentFixture<DashboardInboxLeftSideContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashboardInboxLeftSideContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardInboxLeftSideContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
