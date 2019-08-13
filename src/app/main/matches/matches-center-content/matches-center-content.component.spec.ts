import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MatchesCenterContentComponent } from './matches-center-content.component';

describe('MatchesCenterContentComponent', () => {
  let component: MatchesCenterContentComponent;
  let fixture: ComponentFixture<MatchesCenterContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MatchesCenterContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MatchesCenterContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
