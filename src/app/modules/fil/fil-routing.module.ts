import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FilComponent } from './fil.component';

const FIL_ROUTES = [
  {
    path: '',
    component: FilComponent
  },
];

@NgModule({
  imports: [
    RouterModule.forChild(FIL_ROUTES)
  ]
})
export class FilRoutingModule { }
