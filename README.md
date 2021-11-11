# RemoteGCC
MI4 - Remote GCC compiler with docker images

##  What's embedeed?

Two `debian:stable` images as bases.

The former for the web interface, handled by [Lighttpd](https://www.lighttpd.net/).

The latter as a GCC compiler, that receives source codes from the web interface, build binaries and bring them in a persistent volume `./binaries`.

![Conception schema](./Conception/conception.svg)

## How to use

```bash
docker-compose up
```

Then check [http://localhost:8080/](http://localhost:8080/)

1. add your `Makefile` and `.c` files
2. click `Compile`
3. watch `gcc` logs
4. download the output binaries (also available in `i./binaries`)

## Rid of default values?

They are available in `.env`.

```bash
# .env will be used by docker-compose for modified environment values
# edit values with your modified values
vi .env
```

Need to reset environment values? `cp .env.sample .env`
