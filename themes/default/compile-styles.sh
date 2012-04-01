#! /bin/bash

cd "$(dirname "$0")"
stylus ./styles/styles.styl ./styles/typography.styl -o css/ -w
