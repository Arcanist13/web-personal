import { Component, Inject, OnInit } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { IBook, INewBook } from 'src/app/shared/models/book.model';

@Component({
  selector: 'app-new-book',
  templateUrl: './new-book.component.html',
  styleUrls: ['./new-book.component.css']
})
export class NewBookComponent {

  private _title = new FormControl('', [Validators.required]);
  private _authour = new FormControl('', [Validators.required]);
  private _series = new FormControl('', []);
  private _genre = new FormControl('', [Validators.required]);

  constructor(
    public dialogRef: MatDialogRef<NewBookComponent>,
    @Inject(MAT_DIALOG_DATA) public data: IBook,
  ) {
    if (!!data) {
      this._title.setValue(data.name);
      this._authour.setValue(data.authour);
      this._series.setValue(data.series_name);
      this._genre.setValue(data.genre);
    }
  }

  /**
   * Close the dialog
   */
  close(): void {
    this.dialogRef.close();
  }

  /**
   * Get the error message for the name parameter
   *
   * @returns error string
   */
  getErrorMessage(field: FormControl): string {
    if (field.hasError('required')) {
      return 'You must enter a value';
    }
    return '';
  }

  /**
   * Check if the form is valid
   *
   * @returns form valid
   */
  validData(): boolean {
    return this.title.valid &&
    this.authour.valid &&
    this.series.valid &&
    this.genre.valid
  }

  /**
   * Get the book object (new or edit) from the form fields
   * @returns
   */
  getBookData(): IBook | INewBook | undefined {
    return {
      id: !!this.data ? this.data.id : undefined,
      name: this.title.value,
      authour: this.authour.value,
      series_name: this.series.value,
      genre: this.genre.value
    }
  }

  public get title() : FormControl {
    return this._title;
  }

  public get authour() : FormControl {
    return this._authour;
  }

  public get series() : FormControl {
    return this._series;
  }

  public get genre() : FormControl {
    return this._genre;
  }

}
