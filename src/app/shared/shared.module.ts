import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HttpClientModule } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { MatDialogModule } from '@angular/material/dialog';
import { MatIconModule } from '@angular/material/icon';
import { MatCardModule } from '@angular/material/card';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSortModule } from '@angular/material/sort';
import { RouterModule } from '@angular/router';
import { ConfirmDialogComponent } from './dialog/confirm-dialog/confirm-dialog.component';

const MATERIAL_IMPORTS = [
  MatDialogModule,
  MatIconModule,
  MatCardModule,
  MatInputModule,
  MatButtonModule,
  MatSortModule,
];

const DIALOG_COMPONENTS = [
  ConfirmDialogComponent,
]

@NgModule({
  declarations: [
    ...DIALOG_COMPONENTS,
  ],
  imports: [
    CommonModule,
    HttpClientModule,
    RouterModule,
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    ...MATERIAL_IMPORTS,
  ],
  exports: [
    HttpClientModule,
    RouterModule,
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    ...MATERIAL_IMPORTS,
    ...DIALOG_COMPONENTS,
  ]
})
export class SharedModule { }
