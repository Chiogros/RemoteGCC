FROM debian:stable

# Installation
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y procps
RUN apt-get install -y lighttpd

# Port exposure
EXPOSE 8080 80

# Copy websites files
COPY html/ /var/www/html

# website folder
WORKDIR /var/www/html

# Start lighttpd
ENTRYPOINT ["/usr/sbin/lighttpd", "-D", "-f", "/etc/lighttpd/lighttpd.conf"]
