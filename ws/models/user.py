'''User models'''

from typing import Optional
from pydantic import BaseModel

class User(BaseModel):
  '''Base user information'''
  id:               int
  username:         str
  email:            str
  admin:            int
  created:          int
  activity:         Optional[int]

class UserInDB(User):
  '''Database user information'''
  hashed_password:  str

class UserRegister(BaseModel):
  '''User registration information'''
  username:         str
  password:         str
  email:            str
