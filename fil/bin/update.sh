#!/bin/bash

sqlite3 ../fuckitlist.db "DROP TABLE $2;"
sqlite3 ../fuckitlist.db "CREATE TABLE $2(ID INTEGER PRIMARY KEY NOT NULL, DESC TEXT NOT NULL, COMPLETE TEXT);"


while IFS='' read line || [[ -n "$line" ]]; do
  sqlite3 ../fuckitlist.db "INSERT INTO $2 (DESC) VALUES (\"$line\");"
done < "$1"
