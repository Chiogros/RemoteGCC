#!/bin/bash

# Allow www-data user to write to the volumes
chmod a+rwx /mnt/out /mnt/in /mnt/log

# Run server
/usr/sbin/lighttpd -D -f /etc/lighttpd/lighttpd.conf

