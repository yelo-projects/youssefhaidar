#!/bin/bash

usage() {
    echo -e "\minify.sh FILE [FILE...]"
    echo "Bundle (and minify) all JavaScripts specified as arguments in the current directory into js.js"
}

BUNDLEFILE='js.js'
YUICOMPRESSOR="yuicompressor-2.4.7.jar"

if [ -e "./$BUNDLEFILE" ]; then
    echo -e "Removing existing copy of $BUNDLEFILE."
    rm $BUNDLEFILE
fi

echo -e "\nMinifying JavaScripts..."
jslist=`find . -type f -name \*.js ! -name jquery\*`

for jsfile in "$@"
do
    if [ ./$BUNDLEFILE != ${jsfile} ]
    then
        echo "Processing: ${jsfile}"
        java -jar ${YUICOMPRESSOR} ${jsfile} >> $BUNDLEFILE
    fi
done

echo -e "\nDone."
exit 0
