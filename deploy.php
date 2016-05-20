<?php
/**
 * Contest web application deployer tool
 *
 * PHP version 5
 *
 * @category Deployer
 * @package  Bt-contest
 * @author   barantaran <yourchev@gmail.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause License
 * @link     https://github.com/bt-contest
 */

require 'recipe/composer.php';

serverList('servers.yml');

set('repository', 'https://github.com/MIR24/backend-client.git');
set(
    'shared_dirs', [
    'public/files',
    'config',
    'log'
    ]
);

task(
    'build_source', function () {
        cd("tmp/current/");
        run(" npm install");
        cd("tmp/current/");
        run(" npm update");
        cd("tmp/current/");
        run(" npm run build");
    }
);

task(
    'move_build', function () {
        run("cp tmp/current/build/* tmp/last_build/");
    }
);

task(
    'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    //'deploy:shared',
    //'deploy:vendors',
    'deploy:symlink',
    'cleanup',
    'build_source',
    'move_build'
    ]
)->desc('Deploy project');