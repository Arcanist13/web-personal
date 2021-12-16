import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MatDialogModule } from '@angular/material/dialog';

const MATERIAL_IMPORTS = [
  MatDialogModule
];

@NgModule({
  declarations: [

  ],
  imports: [
    CommonModule,
    BrowserAnimationsModule,
    ...MATERIAL_IMPORTS,
  ],
  exports: [
    BrowserAnimationsModule,
    ...MATERIAL_IMPORTS,
  ]
})
export class SharedModule { }
