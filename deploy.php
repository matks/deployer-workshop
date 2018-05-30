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

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    /*'deploy:update_code',
    'deploy:symlink',
    'cleanup',
    'success'*/
]);
