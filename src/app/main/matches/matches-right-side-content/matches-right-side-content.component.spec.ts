import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MatchesRightSideContentComponent } from './matches-right-side-content.component';

describe('MatchesRightSideContentComponent', () => {
  let component: MatchesRightSideContentComponent;
  let fixture: ComponentFixture<MatchesRightSideContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MatchesRightSideContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MatchesRightSideContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
