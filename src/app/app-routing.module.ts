import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'user',
    loadChildren: () => import('src/app/modules/user/user-routing.module').then(m => m.UserRoutingModule)
  },
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
    redirectTo: '/'
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
