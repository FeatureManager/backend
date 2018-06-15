# Contributing

Thank you for considering contributing to the Feature Manager! Welcome to our Contributing Guide.

## Getting Started

First of all you need [Docker](https://www.docker.com/) and Docker Composer installed on your computer and some basic knowledgement how it works. We assume you know how [Docker](https://www.docker.com/) and Docker Composer works. Let's get start...

## Running Docker Container

After you have cloned the repository you can see the ```docker-composer.yml``` and the ```.docker``` directory on project's root folder. Once finished the cloning process you must execute the commands as follows:

```bash
docker-composer build
```

_**Note**_: Build command could take some while.

And to turn on the Container:

```bash
docker-composer up [-d]
```

_**Note**_: Optionally, on Up command you can use -d for non-verbose output.

At this point you should be able to access the Backend on url:

[http://localhost:8080/](http://localhost:8080/)

Since Feature Manager backend is based on [Lumen](https://lumen.laravel.com), you must enter on container bash and give some directories permissions:

```bash
chmod -R o+rw bootstrap/ storage/
```

Ok, you almost there, now let's create the database (yet on container bash):

```bash
php artisan migrate
```

Now, you are able to code!
