#!/bin/bash
# looks for .c files in /mnt/in, compile it, put it on /mnt/out
while true; do

    if [ -f ok.gcc]


        #if there is a makefile 
        if [ -f make ] then
            #process it
            make
        #else if there is one or more c files
        elif [ -f *.c ] then
            for $c_file in *.c; do
                $name = $(basename $c_file .c)
                gcc $c_file -o $name
            done
        #else ?!
        else
            echo "eh?"
        fi
        #RM or MV
        rm *.c
        rm make
        mv * /mnt/out
    fi
sleep 5
done;