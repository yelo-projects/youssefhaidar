#! /bin/bash

cd "$(dirname "$0")"

gnome-terminal -x stylus ./styles/styles.styl -o css/ -w
cd styles
gnome-terminal -x vim -S ../.styles.vim
