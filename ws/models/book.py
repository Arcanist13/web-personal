'''Book models'''

from typing import Optional
from pydantic import BaseModel

class Book(BaseModel):
  '''Book information'''
  id:           int
  name:         str
  authour:      str
  series_name:  Optional[str]
  genre:        Optional[str]

class NewBook(BaseModel):
  '''Book information'''
  name:         str
  authour:      str
  series_name:  Optional[str]
  genre:        Optional[str]
