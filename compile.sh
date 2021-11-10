#!/bin/bash

### looks for make & .c files in /mnt/in, compile them, put them on /mnt/out ###
### compilation trigger => existence of ok.gcc file in /mnt/in ###
cd /mnt/in
while true; do

    if [ -f ok.gcc ]; then

        #if there is a makefile process it
        if [ -f Makefile ]; then
            make
        #else if there is C files compile them
        elif [ -f *.c ]; then
            for c_file in *.c; do
                echo "$c_file"
                name=$(basename $c_file .c)
                gcc $c_file -o $name
                echo "c compiled"
            done

        #if there is no makefile AND no c file(s), but the ok.gcc file exists
        else
            echo "no makefile and no C file in this directory."
            rm *
        fi

        #CLEAR IN FOLDER
        rm *.c
        rm Makefile
        rm ok.gcc

        #MV COMPILED CODE TO OUT FOLDER
        mv * /mnt/out/
    fi
sleep 5
done