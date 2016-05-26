# Contest deployer configuration

Used to deploy [MIR24 web app](https://github.com/MIR24) with [deployerphp](http://deployer.org/).

Depends on [simple-helpers/php-github-webhook](https://github.com/simple-helpers/php-github-webhook.git) catching github webhooks.

###Simple install deploy-server.
If do not have nodejs, npm, php, webserver installed use docker procedure instead.
```
$ git clone git@github.com:MIR24/deploy.git
$ ./install.sh
```

###Install deployer using docker container:
```
$ git clone git@github.com:MIR24/deploy.git
$ ./install-with-docker.sh
```

###Start deploy-server listening for github webhook inside docker container.
```
$ docker run -p 80:80 -it  --name mir24deploy -v "$PWD":/var/www/html barantaran/php7-nodejs
```
