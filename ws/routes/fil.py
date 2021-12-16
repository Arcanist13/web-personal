from typing import List

from fastapi import APIRouter, Depends, HTTPException

from database.sqlite3 import delete_id, execute, get_db_all, get_db_one
from auth.auth import get_current_admin_user
from models.fil import FIL, NewFIL
from models.user import User

router = APIRouter()

@router.get("/fil", response_model=List[FIL], tags=['FIL'])
async def get_fil():
  fil = get_db_all("SELECT * FROM fil")
  if fil is not None:
    return fil
  raise HTTPException(status_code=500, detail="An error occurred. Unable to load FIL.")

@router.post("/fil/add", response_model=FIL, tags=['FIL'])
async def add_fil(new_fil: NewFIL, user: User = Depends(get_current_admin_user)):
  if new_fil is not None:
    execute('''
      INSERT INTO fils (name,complete) VALUES (?,?)
    ''', [new_fil.name, new_fil.complete])
    return get_db_one("SELECT * FROM fil ORDER BY id DESC LIMIT 1")
  raise HTTPException(status_code=500, detail="Failed to add a new fil.")

@router.delete("/fil/remove/{fil_id}", tags=['FIL'])
async def remove_fil(fil_id: int, user: User = Depends(get_current_admin_user)):
  if fil_id is not None and fil_id_exists(fil_id):
    if not delete_id('fil', fil_id):
      raise HTTPException(status_code=500, detail='Failed to delete fil.')
  else:
    raise HTTPException(status_code=500, detail='Failed to delete a fil that does not exist.')

@router.post("/fil/edit/{fil_id}", response_model=FIL, tags=['FIL'])
async def edit_fil(fil_id: int, fil: FIL, user: User = Depends(get_current_admin_user)):
  if fil_id is not None and fil_id_exists(fil_id):
    execute('''
      UPDATE fil SET
      name = ?, complete = ?
      WHERE id = ?
    ''', [fil.name, fil.complete, fil_id])
    return get_db_one('SELECT * FROM fil WHERE id = ?', [fil_id])
  raise HTTPException(status_code=500, detail='Failed to modify a character that is not yours')

def fil_id_exists(fil_id: int) -> bool:
  '''Check if a character belongs to a user'''
  res = get_db_one("SELECT id FROM fil WHERE id = ?", [fil_id])
  if res is not None:
    return True
  else:
    return False
