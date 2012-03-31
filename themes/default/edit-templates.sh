#! /bin/bash

cd "$(dirname "$0")"
cd templates/Layout
gnome-terminal -x vim -S ../../.templates.vim
