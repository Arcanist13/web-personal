import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { IBook, INewBook } from 'src/app/shared/models/book.model';
import { environment } from 'src/environments/environment';
import { Sort } from '@angular/material/sort';
import { sortData } from 'src/app/static/functions/sort.function';
import { MatDialog } from '@angular/material/dialog';
import { NewBookComponent } from './components/new-book/new-book.component';
import { BookDataService } from './services/book-data.service';
import { ObservableService } from 'src/app/static/services/observable.service';
import { UserService } from '../user/services/user.service';
import { ConfirmDialogComponent } from 'src/app/shared/dialog/confirm-dialog/confirm-dialog.component';

@Component({
  selector: 'app-library',
  templateUrl: './library.component.html',
  styleUrls: ['./library.component.css'],
  providers: [ObservableService]
})
export class LibraryComponent {

  public filterText = '';

  private _library: Array<IBook> = [];
  private _baseLibrary: Array<IBook> = [];

  constructor(
    private _http: HttpClient,
    public _dialog: MatDialog,
    private _bookDataService: BookDataService,
    private _observableService: ObservableService,
    public userService: UserService,
  ) {
    this.getBooks();

    // Subscribe to book updates
    this._observableService.subscribe(
      this._bookDataService.onBookUpdated,
      () => { this.getBooks(); }
    )
  }

  /**
   * Get the library books
   */
  public get library() : Array<IBook> {
    return this._library;
  }

  /**
   * Get the list of books
   */
  private getBooks(): void {
    // Get the list of books
    this._http.get<Array<IBook>>(environment.backendUri + '/books').subscribe(
      (library: Array<IBook>) => {
        this._library = library;
        this._baseLibrary = this._library.slice();
      }
    );
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

  /**
   * Open the create/edit book dialog allowing input options
   */
  createBookDialog(book?: IBook): void {
    const dialogRef = this._dialog.open(NewBookComponent, { data: book });
    dialogRef.afterClosed().subscribe((res: IBook | INewBook) => {
      if (!!res) {
        if(!!book) {
          this._bookDataService.editBook(res as IBook);
        } else {
          this._bookDataService.createBook(res as INewBook);
        }
      }
    });
  }

  /**
   * Confirm screen for deleting a book
   *
   * @param book book information
   */
  deleteBookDialog(book: IBook): void {
    const dialogRef = this._dialog.open(ConfirmDialogComponent, { data: 'Are you sure you wish to delete "' + book.name + '"?' });
    dialogRef.afterClosed().subscribe((res: boolean) => {
      if (res) {
        this._bookDataService.deleteBook(book.id);
      }
    });
  }

}
