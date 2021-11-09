FROM debian:stable

# Installation
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y lighttpd

# Port exposure
EXPOSE 8080 80

# Copy new websites files
RUN rm -rf /var/www/html
COPY html /var/www

# website folder
WORKDIR /var/www/html

# Start lighttpd
ENTRYPOINT ["/usr/sbin/lighttpd", "-D", "-f", "/etc/lighttpd/lighttpd.conf"]
