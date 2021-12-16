''' FIL models '''

from pydantic import BaseModel

class FIL(BaseModel):
  ''' Fuck it list model '''
  id:           int
  name:         str
  complete:     int

class NewFIL(BaseModel):
  ''' Fuck it list model '''
  name:         str
  complete:     int

