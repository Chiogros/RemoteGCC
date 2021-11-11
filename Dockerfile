FROM debian:latest
RUN apt-get update && apt-get upgrade -y
RUN apt-get install build-essential -y
WORKDIR /user/local/bin
COPY compile.sh .
ENTRYPOINT [ "./compile.sh" ]