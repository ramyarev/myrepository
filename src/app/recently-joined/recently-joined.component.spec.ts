import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RecentlyJoinedComponent } from './recently-joined.component';

describe('RecentlyJoinedComponent', () => {
  let component: RecentlyJoinedComponent;
  let fixture: ComponentFixture<RecentlyJoinedComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RecentlyJoinedComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RecentlyJoinedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
