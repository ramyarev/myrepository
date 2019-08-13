import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShareIdentityComponent } from './share-identity.component';

describe('ShareIdentityComponent', () => {
  let component: ShareIdentityComponent;
  let fixture: ComponentFixture<ShareIdentityComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShareIdentityComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShareIdentityComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
