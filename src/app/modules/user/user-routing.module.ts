import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { LoginComponent } from './components/login/login.component';

const USER_ROUTES = [
  {
    path: 'login',
    component: LoginComponent
  },
];

@NgModule({
  imports: [
    RouterModule.forChild(USER_ROUTES)
  ]
})
export class UserRoutingModule { }
