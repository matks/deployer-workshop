<?php
namespace Deployer;
require 'recipe/common.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:matks/deploy-test-apps.git');
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);

// Servers

serverList('server.yml');


// Tasks
task('test', function () {
    writeln('Hello world');
});

task('custom:vendors_in_php2', function () {
    run('cd {{release_path}}/apps/php2 && {{env_vars}} {{bin/composer}} {{composer_options}}');
});

desc('Deploy index.html');
task('deploy-one', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'cleanup',
    'success'
]);

desc('Deploy app php2');
task('deploy-two', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'custom:vendors_in_php2',
    'deploy:clear_paths',
    'deploy:symlink',
    'cleanup',
    'success'
]);
