# Remote Feature Toggle (backend)

Backend for Remote Feature Toggle Project.

This backend is designed for work alone however the official frontend for this project can be founed [here](https://github.com/RemoteFeatureToggle/frontend).

## Getting Started

Since Remote Feature Toggle is based on [Lumen](https://lumen.laravel.com), we must give some directories permissions:

```bash
$ chmod -R o+rw bootstrap/ storage/
```

<!-- And if you want use Redis for cache system, you must install predis package:

```bash
$ composer require predis/predis
```
And configure to ```CACHE_DRIVER=redis``` on ```.env``` file.

For more informations: [Lumen Cache Documentation](https://lumen.laravel.com/docs/cache). -->