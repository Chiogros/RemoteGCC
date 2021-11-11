FROM debian:stable

# Installation
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y php-cgi lighttpd 

# Port exposure
EXPOSE 8080 80

# Specify volumes
# bring pushed files
VOLUME /mnt/out
# get compiled files (binaries)
VOLUME /mnt/in
# get compilation logs
VOLUME /mnt/log

# Copy new websites files
RUN rm -rf /var/www/html/*
COPY html /var/www/html
RUN chown www-data:www-data -R /var/www/html

#Symbolic link in /var/www/html folder so /mnt files are accessible from there
#so files can be downloaded.
RUN ln -s /mnt /var/www/html

# Enable php support in lighttpd
RUN lighttpd-enable-mod fastcgi-php
RUN mkdir /run/lighttpd
RUN chown www-data:www-data /run/lighttpd

# Import startup script
COPY startup.sh /tmp

# website folder
WORKDIR /var/www/html

# Start lighttpd
ENTRYPOINT ["/tmp/startup.sh"]
