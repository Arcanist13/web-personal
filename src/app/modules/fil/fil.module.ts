import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FilComponent } from './fil.component';
import { SharedModule } from 'src/app/shared/shared.module';



@NgModule({
  declarations: [
    FilComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
  ],
  exports: [
    FilComponent,
  ]
})
export class FilModule { }
