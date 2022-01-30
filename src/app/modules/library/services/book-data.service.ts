import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';
import { IBook, INewBook } from 'src/app/shared/models/book.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class BookDataService {

  private _bookUpdated: Subject<void> = new Subject<void>();

  constructor(
    private _http: HttpClient
  ) { }

  /**
   * Create a new book
   *
   * @param book book information
   */
  createBook(book: INewBook): void {
    this._http.post<IBook>(
      environment.backendUri + '/book/add',
      book
    ).subscribe((res: IBook) => {
      if (!!res) {
        this._bookUpdated.next();
      }
    });
  }

  /**
   * Update an existing books details
   *
   * @param book new book details
   */
  editBook(book: IBook): void {
    this._http.post<IBook>(
      environment.backendUri + '/book/edit/' + book.id.toString(),
      book
    ).subscribe((res: IBook) => {
      if (!!res) {
        this._bookUpdated.next();
      }
    });
  }

  /**
   * Delete a book
   *
   * @param book_id book id to delete
   */
  deleteBook(book_id: number): void {
    this._http.delete(
      environment.backendUri + '/book/remove/' + book_id.toString()
    ).subscribe(() => {
      this._bookUpdated.next();
    });
  }

  /**
   * Listener for book update events
   */
  public get onBookUpdated() : Subject<void> {
    return this._bookUpdated;
  }

}
