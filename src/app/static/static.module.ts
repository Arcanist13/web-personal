import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../shared/shared.module';
import { HeaderComponent } from './components/header/header.component';
import { DefaultComponent } from './components/default/default.component';



@NgModule({
  declarations: [
    HeaderComponent,
    DefaultComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
  ],
  exports: [
    HeaderComponent,
    DefaultComponent,
  ]
})
export class StaticModule { }
