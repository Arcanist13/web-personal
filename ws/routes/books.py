from typing import List

from fastapi import APIRouter, Depends, HTTPException

from database.sqlite3 import delete_id, execute, get_db_all, get_db_one
from auth.auth import get_current_admin_user
from models.book import Book, NewBook
from models.user import User

router = APIRouter()

@router.get("/books", response_model=List[Book], tags=['library'])
async def get_books(current_user: User = Depends(get_current_admin_user)):
  books = get_db_all("SELECT * FROM books")
  if books is not None:
    return books
  raise HTTPException(status_code=500, detail="An error occurred. Unable to load book list.")

@router.post("/book/add", response_model=Book, tags=['library'])
async def add_book(new_book: NewBook, user: User = Depends(get_current_admin_user)):
  if new_book is not None:
    execute('''
      INSERT INTO books (name,authour,series_name,genre) VALUES (?,?,?,?)
    ''', [new_book.name, new_book.authour, new_book.series_name, new_book.genre])
    return get_db_one("SELECT * FROM books ORDER BY id DESC LIMIT 1")
  raise HTTPException(status_code=500, detail="Failed to add a new book.")

@router.delete("/book/remove/{book_id}", tags=['library'])
async def remove_book(book_id: int, user: User = Depends(get_current_admin_user)):
  if book_id is not None and book_id_exists(book_id):
    if not delete_id('books', book_id):
      raise HTTPException(status_code=500, detail='Failed to delete book')
  else:
    raise HTTPException(status_code=500, detail='Failed to delete a book that does not exist')

@router.post("/book/edit/{book_id}", response_model=Book, tags=['library'])
async def edit_book(book_id: int, book: Book, user: User = Depends(get_current_admin_user)):
  if book_id is not None and book_id_exists(book_id):
    execute('''
      UPDATE books SET
      name = ?, authour = ?, series_name = ?, genre = ?
      WHERE id = ?
    ''', [book.name, book.authour, book.series_name, book.genre, book_id])
    return get_db_one('SELECT * FROM books WHERE id = ?', [book_id])
  raise HTTPException(status_code=500, detail='Failed to modify a character that is not yours')

def book_id_exists(book_id: int) -> bool:
  '''Check if a character belongs to a user'''
  res = get_db_one("SELECT id FROM books WHERE id = ?", [book_id])
  if res is not None:
    return True
  else:
    return False
