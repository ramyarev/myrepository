import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CardFooterIconComponent } from './card-footer-icon.component';

describe('CardFooterIconComponent', () => {
  let component: CardFooterIconComponent;
  let fixture: ComponentFixture<CardFooterIconComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CardFooterIconComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CardFooterIconComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
