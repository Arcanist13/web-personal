#!/bin/bash

# Frontend
ng build --configuration production
cp -fr /home/arcanist/repos/web-personal/dist/web-personal/* /home/arcanist/live/web-personal/ui

# Backend
/home/arcanist/live/web-personal/ws/stop.sh
rsync -avr --exclude=*.db /home/arcanist/repos/web-personal/ws/ /home/arcanist/live/web-personal/ws
/home/arcanist/live/web-personal/ws/start.sh
