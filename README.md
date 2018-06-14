# Feature Manager

[![Build Status](https://travis-ci.org/FeatureManager/backend.svg?branch=master)](https://travis-ci.org/FeatureManager/backend) [![Coverage Status](https://coveralls.io/repos/github/FeatureManager/backend/badge.svg?branch=master)](https://coveralls.io/github/FeatureManager/backend?branch=master) [![StyleCI](https://github.styleci.io/repos/135836665/shield?branch=master&style=flat)](https://github.styleci.io/repos/135836665) [![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)



The Feature Manager project is a tool to turn on/off your projects features and/or set environmental parameters remotely.

## About Feature Manager (backend)

A PHP [Lumen](https://lumen.laravel.com)-based Backend for Feature Manager Project.

This backend is designed for work alone, however the official frontend for the project can be found [here](https://github.com/FeatureManager/frontend).

## Contributing

Thank you for considering contributing to the Feature Manager!

### Getting Started

First of all you need [Docker](https://www.docker.com/) and Docker Composer installed on your computer and some basic knowledgement how it works. We assume you know how [Docker](https://www.docker.com/) and Docker Composer works. Let's get start...

### Running Docker Container

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

### Code of Conduct

In order to ensure that the Feature Manager community is welcoming to all, please review and abide by the [Code of Conduct](CODE_OF_CONDUCT.md).

## Security Vulnerabilities

If you discover a security vulnerability within Feature Manager, please [create a vulnerability issue](https://github.com/FeatureManager/backend/issues/new?labels=security%20vulnerabilities). All security vulnerabilities will be promptly addressed.

## License

The Feature Manager is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
