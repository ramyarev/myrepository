import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardDiscoverLeftSideContentComponent } from './dashboard-discover-left-side-content.component';

describe('DashboardDiscoverLeftSideContentComponent', () => {
  let component: DashboardDiscoverLeftSideContentComponent;
  let fixture: ComponentFixture<DashboardDiscoverLeftSideContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashboardDiscoverLeftSideContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardDiscoverLeftSideContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
