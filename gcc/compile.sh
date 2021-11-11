#!/bin/bash

inFolder=/mnt/in/
outFolder=/mnt/out/
logFolder=/mnt/log/

compilationLogFile="${logFolder}compilation.log"
tmpCompilationLogFile=/tmp/compilation.log

triggerFile="ok.gcc"

### looks for make & .c files in /mnt/in, compile them, put them on /mnt/out ###
### compilation trigger => existence of ok.gcc file in /mnt/in ###
cd $inFolder

while true; do

	if [ -f "$triggerFile" ]; then
		
		# Clear flag file
		rm -f "$triggerFile" 2> /dev/null
		
		# Clear last log files
		rm "$compilationLogFile" 2> /dev/null
		rm "$tmpCompilationLogFile" 2> /dev/null
		
		# Clean old binaries
		binaries="${outFolder}*"
		rm -f $binaries
		
		# if there is a makefile, process it
		if [ -f makefile ]; then
			make
		
		# else if there are C files, compile them
		elif [ $(ls -1q *.c | wc -l) -ne 0 ]; then
			for c_file in *.c; do
				echo "Compiling ${c_file}..."
				
				# Create out binary pathname
				name=$(basename "$c_file" .c)
				outPath="${outFolder}${name}"
				
				# Compile to out folder and log
				gcc "$c_file" -o "$outPath" &>> "$tmpCompilationLogFile"
				
				echo "${c_file} compiled!"
			done
			
			# Write success compilation message in log
			if [ ! -s "$tmpCompilationLogFile" ]; then
				echo "Compilation went successful!" > "$tmpCompilationLogFile"
			fi
		
		#if there is no makefile AND no C file(s), but the ok.gcc file exists
		else
			# Need to stop webserver loop
			echo "Nothing to compile..." > "$tmpCompilationLogFile"
		fi
		
		# clear input folder
		rm * 2> /dev/null
		
		# move tmp log file to definite folder
		mv "$tmpCompilationLogFile" "$compilationLogFile"
		
	 fi
	 sleep 5
done
