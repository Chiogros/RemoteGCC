FROM debian:21.04
RUN apt-get update && apt-get upgrade -y
RUN apt-get install build-essentials