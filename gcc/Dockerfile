FROM debian:latest

# Update and install gcc
RUN apt-get update && apt-get upgrade -y
RUN apt-get install build-essential -y

# Mount volumes
VOLUME /mnt/out
VOLUME /mnt/in
VOLUME /mnt/log

WORKDIR /usr/local/bin
COPY compile.sh .

# Startup script
ENTRYPOINT [ "./compile.sh" ]
