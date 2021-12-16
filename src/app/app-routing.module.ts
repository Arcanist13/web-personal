import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'library',
    loadChildren: () => import('src/app/modules/library/library-routing.module').then(m => m.LibraryRoutingModule)
  },
  {
    path: 'fil',
    loadChildren: () => import('src/app/modules/fil/fil-routing.module').then(m => m.FilRoutingModule)
  },
  {
    path: '**',
    redirectTo: '/home'
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
