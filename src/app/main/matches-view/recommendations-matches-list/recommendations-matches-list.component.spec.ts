import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RecommendationsMatchesListComponent } from './recommendations-matches-list.component';

describe('RecommendationsMatchesListComponent', () => {
  let component: RecommendationsMatchesListComponent;
  let fixture: ComponentFixture<RecommendationsMatchesListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RecommendationsMatchesListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RecommendationsMatchesListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
