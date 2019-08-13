import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardSearchRightSideContentComponent } from './dashboard-search-right-side-content.component';

describe('DashboardSearchRightSideContentComponent', () => {
  let component: DashboardSearchRightSideContentComponent;
  let fixture: ComponentFixture<DashboardSearchRightSideContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashboardSearchRightSideContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardSearchRightSideContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
