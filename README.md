# RemoteGCC
MI4 - Remote GCC compiler with docker images

##  What's embedded ?

Two images, both built on top of the `debian:stable` image.

The former is a straightforward web-app, handled by [Lighttpd](https://www.lighttpd.net/).

The latter is a GCC compiler, which receives source codes from the web-app, builds binaries and bring them in a persistent volume: `./binaries`. (this volume is customizable by modifying the corresponding environment variable.)

![Conception schema](./Conception/conception.svg)

## How to use
`cd` into the REMOTEGCC directory then run:
```bash
docker-compose up
```

In a web browser of your choice
copy/paste the following link: [http://localhost:8080/](http://localhost:8080/)

1. add your `.c` files (with `.h` and `makefile` if necessary). If no `makefile` is present, all `.c` files will be independently compiled.
2. click `Compile`
3. watch `gcc` logs
4. download the output binaries (also available in `./binaries`)

## Environment variables
Environment variables can be used to modify the behiavor of the application.<br/>
Environment variables can be found in the .env file, at the root of the application.
<hr/>

the `BINARIES_DIR` variable tells the application where to persist the binaries <br/>
This path appends to the REMOTEGCC folder path.<br/>

```bash
#default value
BINARIES_DIR=./binaries
```

<hr/>

the `HTTPD_PORT` variable tells the application what port to expose.<br/>
```bash
#default value
HTTPD_PORT=8080
```
## Rid of default values?

They are available in `.env`.

```bash
# .env will be used by docker-compose for modified environment values
# edit values with your modified values
vi .env
```
<hr/>

Need to reset environment values?<br/>
```bash
cp .env.sample .env
```