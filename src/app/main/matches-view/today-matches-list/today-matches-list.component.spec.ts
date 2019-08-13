import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TodayMatchesListComponent } from './today-matches-list.component';

describe('TodayMatchesListComponent', () => {
  let component: TodayMatchesListComponent;
  let fixture: ComponentFixture<TodayMatchesListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TodayMatchesListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TodayMatchesListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
