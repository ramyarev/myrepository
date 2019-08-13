import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NearByMeMatchesListComponent } from './near-by-me-matches-list.component';

describe('NearByMeMatchesListComponent', () => {
  let component: NearByMeMatchesListComponent;
  let fixture: ComponentFixture<NearByMeMatchesListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NearByMeMatchesListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NearByMeMatchesListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
