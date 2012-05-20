#!/bin/bash 

cd "$(dirname "$0")"
sudo chmod -R 777 silverstripe-cache
rm -R silverstripe-cache
mkdir silverstripe-cache
sudo chmod -R 777 silverstripe-cache
