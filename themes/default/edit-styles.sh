#! /bin/bash

cd "$(dirname "$0")"

cd styles
gnome-terminal -x vim -S ../.styles.vim
cd ..
gnome-terminal -x ./compile-styles.sh 
