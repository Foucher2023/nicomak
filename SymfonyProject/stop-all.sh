#!/bin/bash

cd ThanksPages/ || exit 1
symfony server:stop
cd ..
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)