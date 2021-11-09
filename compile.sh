#!/bin/bash
### looks for make & .c files in /mnt/in, compile them, put them on /mnt/out ###
### compilation trigger => existence of ok.gcc file in /mnt/in ###


while true; do

    if [ -f ok.gcc ]
        #if there is a makefile process it
        if [ -f make ]; then
            make

        #else if there is C files compile them
        elif [ -f *.c ]; then
            for $c_file in *.c; do
                $name = $(basename $c_file .c)
                gcc $c_file -o $name
            done

        #if there is no makefile AND no c file(s), but the ok.gcc file exists
        else
            echo "no makefile and no C file in this directory."
            rm *
        fi
        rm *.c
        rm make
        #clear at some point ?
        mv * /mnt/out
    fi
sleep 5
done;