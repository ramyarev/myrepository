import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MatchesLeftSideContentComponent } from './matches-left-side-content.component';

describe('MatchesLeftSideContentComponent', () => {
  let component: MatchesLeftSideContentComponent;
  let fixture: ComponentFixture<MatchesLeftSideContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MatchesLeftSideContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MatchesLeftSideContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
