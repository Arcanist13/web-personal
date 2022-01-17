import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { HomeComponent } from './home.component';

const HOME_ROUTES = [
  {
    path: '',
    component: HomeComponent
  },
];

@NgModule({
  imports: [
    RouterModule.forChild(HOME_ROUTES)
  ]
})
export class HomeRoutingModule { }
