#!/bin/bash

echo "<?php \$flag='"$FLAG"';" >> /flag

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh
