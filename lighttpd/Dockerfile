FROM debian:stable

# Installation
RUN apt-get update
RUN apt-get install -y lighttpd

# Start lighttpd
RUN /etc/init.d/lighttpd start

# Copy websites files
COPY ./html/ /var/www/html/
