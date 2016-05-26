#!/bin/bash
docker run -it --rm --name mir24-deploy-install -v "$PWD":/usr/src/mir24deploy -w /usr/src/mir24deploy barantaran/php7-nodejs ./install.sh
