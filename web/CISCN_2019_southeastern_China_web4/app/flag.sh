#!/bin/bash

echo $FLAG > /flag.txt

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh
