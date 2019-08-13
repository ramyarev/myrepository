import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PremiumMatchesListComponent } from './premium-matches-list.component';

describe('PremiumMatchesListComponent', () => {
  let component: PremiumMatchesListComponent;
  let fixture: ComponentFixture<PremiumMatchesListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PremiumMatchesListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PremiumMatchesListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
