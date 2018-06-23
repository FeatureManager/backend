# Contributing

Thank you for considering contributing to the Feature Manager! Welcome to our Contribution Guide.

## Table of Contents

1. [Getting Started](#getting-started)
2. [Running Docker Container](#running-docker-container)
3. [Testing](#testing)
4. [Reporting an Issue](#reporting-an-issue)

## Getting Started

First of all you need [Docker](https://www.docker.com/) and Docker Composer installed on your computer and some basic knowledgement how it works. We assume you know how [Docker](https://www.docker.com/) and Docker Composer works. Let's get start...

## Running Docker Container

After you have cloned the repository you can see the ```docker-composer.yml``` and the ```.docker``` directory on project's root folder. Once finished the cloning process you must execute the commands as follows:

```bash
docker-composer build
```

> _**Note**_: Build command could take some while.

And to turn on the Container:

```bash
docker-composer up [-d]
```

> _**Note**_: Optionally, on Up command you can use -d for non-verbose output.

At this point you should be able to access the Backend on url:

[http://localhost:8080/](http://localhost:8080/)

You must enter on container bash. To do that, list your containers:

```bash
docker ps
```

You'll probably see something like this

```bash
CONTAINER ID        IMAGE
a9e84d5f8ba2        feature-manager-docker
1eea28f6747f        mariadb:latest
```

> _**Note**_: We have removed some columns from this results just to fits on this manual.

If you find the ```"feature-manager-docker"``` name on list from ```docker ps``` command, everything is fine until now. So, to access the container bash, type:

```bash
docker run -it feature-manager-docker sh
```

And give some directories permissions, since Feature Manager backend is based on [Lumen](https://lumen.laravel.com):

```bash
chmod -R o+rw bootstrap/ storage/
```

Ok, you're almost there, now let's create the database (yet on container bash):

```bash
php artisan migrate --seed
```

> __**Note**__: `--seed` option is for generate some data for you play. Also Recommended on first time up.

Now, you are able to code! Do your code, write your unit tests, submit some pull requests, and enjoy!

## Testing

Well, at this point you already have learned how to configure the development environment, create the database from Docker container bash, now but no less important let's learn how to test. Of course you already coded your's unit tests right?

As you already know access the container bash access it, and just type:

```bash
php vendor/bin/phpunit -c phpunit.xml
```

Simple as that! And you'll get this kind of response from PHPUnit:

```bash
# php vendor/bin/phpunit -c phpunit.xml
PHPUnit 7.2.4 by Sebastian Bergmann and contributors.

........................                                          24 / 24 (100%)

Time: 1.22 seconds, Memory: 14.00MB

OK (24 tests, 48 assertions)
```

You can do more cool things, let's check the tests coverage now. It's strongly recommended do it before you submit your commits:

```bash
# php vendor/bin/phpunit -c phpunit.xml --coverage-text
PHPUnit 7.2.4 by Sebastian Bergmann and contributors.

........................                                          24 / 24 (100%)

Time: 2.92 seconds, Memory: 16.00MB

OK (24 tests, 48 assertions)

Code Coverage Report:
  2018-06-20 01:18:58

 Summary:
  Classes: 55.56% (10/18)
  Methods: 71.70% (38/53)
  Lines:   84.71% (144/170)

\App::Uuids
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% (  4/  4)
\App\Http\Controllers::App\Http\Controllers\EnvironmentController
  Methods: 100.00% ( 5/ 5)   Lines: 100.00% ( 19/ 19)
...
```

Nice! Now you are able to contributing with any part of API's lifecycle. And again thank you for your time and help!

## Reporting an Issue

1. Describe what you expected to happen and what actually happens.

2. If possible, include a minimal but complete example to help us reproduce the issue.

3. We'll try to fix it as soon as possible but be in mind that Feature Manager is open source and you can probably submit a pull request to fix it even faster.

4. Just [open you issue](https://github.com/FeatureManager/backend/issues/new).