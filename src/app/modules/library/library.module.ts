import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LibraryComponent } from './library.component';
import { SharedModule } from 'src/app/shared/shared.module';
import { NewBookComponent } from './components/new-book/new-book.component';
import { ViewBookComponent } from './components/view-book/view-book.component';



@NgModule({
  declarations: [
    LibraryComponent,
    NewBookComponent,
    ViewBookComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
  ]
})
export class LibraryModule { }
