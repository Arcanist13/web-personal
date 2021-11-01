from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware

from routes import users

app = FastAPI()

# Setup routes
app.include_router(users.router)

# Setup CORS
origins = [
  "https://personal.thearcanerepository.com",
  "https://www.personal.thearcanerepository.com",
  "http://192.168.1.21:4200",
  "http://localhost:4200"
]
app.add_middleware(
  CORSMiddleware,
  allow_origins=origins,
  allow_credentials=True,
  allow_methods=["*"],
  allow_headers=["*"]
)
