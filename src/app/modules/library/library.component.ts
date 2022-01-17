import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { IBook } from 'src/app/shared/models/book.model';
import { environment } from 'src/environments/environment';
import { Sort } from '@angular/material/sort';
import { sortData } from 'src/app/static/functions/sort.function';

@Component({
  selector: 'app-library',
  templateUrl: './library.component.html',
  styleUrls: ['./library.component.css']
})
export class LibraryComponent {

  public filterText = '';

  private _library: Array<IBook> = [];
  private _baseLibrary: Array<IBook> = [];

  constructor(
    private _http: HttpClient,
  ) {
    // Get the list of books
    this._http.get<Array<IBook>>(environment.backendUri + '/books').subscribe(
      (library: Array<IBook>) => {
        this._library = library;
        this._baseLibrary = this._library.slice();
      }
    );
  }

  /**
   * Get the library books
   */
  public get library() : Array<IBook> {
    return this._library;
  }

  /**
   * Check if the given book passes the current feature
   *
   * @param book  book to check
   * @returns     filter pass status
   */
  checkFilter(book: IBook): boolean {
    return book.name.toLowerCase().includes(this.filterText.toLowerCase()) ||
           book.authour.toLowerCase().includes(this.filterText.toLowerCase());
  }

    /**
   * Sort the books array based on the column
   *
   * @param sort  Material sort object
   */
  sortData(sort: Sort): void {
    this._library = sortData<IBook>(sort, this._baseLibrary);
  }

}
