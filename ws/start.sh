#!/bin/bash

screen -d -m -p 0 -S "personal-webserver" bash -c "cd /home/arcanist/live/web-personal/ws; source /home/arcanist/live/web-personal/ws/venv/bin/activate; hypercorn main:app --bind 127.0.0.1:8001"
