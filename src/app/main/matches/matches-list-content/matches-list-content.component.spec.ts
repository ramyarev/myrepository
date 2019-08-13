import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MatchesListContentComponent } from './matches-list-content.component';

describe('MatchesListContentComponent', () => {
  let component: MatchesListContentComponent;
  let fixture: ComponentFixture<MatchesListContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MatchesListContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MatchesListContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
