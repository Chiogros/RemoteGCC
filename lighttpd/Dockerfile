FROM debian:stable

# Installation
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y lighttpd

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

# website folder
WORKDIR /var/www/html

# Start lighttpd
ENTRYPOINT ["ls", "-l", "/var/www"]
ENTRYPOINT ["/usr/sbin/lighttpd", "-D", "-f", "/etc/lighttpd/lighttpd.conf"]
