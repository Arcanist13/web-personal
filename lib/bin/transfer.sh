#!/bin/bash

while IFS='' read line || [[ -n "$line" ]]; do
	OIFS=$IFS
	IFS=','
	split=$line
	COUNT=0
	for element in $split; do
		#refined="${element//\'/&apos}"
		data[$COUNT]=$element
		((COUNT++))
	done
	
	sqlite3 library.db "INSERT INTO BOOKS (TITLE, AUTHOUR, SERIES, YEAR, EDITION, IMPRESSION, ISBN, PUBLISHER, GENRE) VALUES (\"${data[1]}\", \"${data[3]}\", \"${data[2]}\", \"${data[4]}\", \"${data[5]}\", \"${data[6]}\", \"${data[7]}\", \"${data[8]}\", \"${data[9]}\");"
	echo Added "${data[1]}".
	IFS=$OIFS
done < data.csv