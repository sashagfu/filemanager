<?php

Config::set('site_name', 'File Manager');

Config::set('languages', ['en']);

// Routes
Config::set('routes', [
    'default' => '',
]);

Config::set('default_route', 'filemanager');
Config::set('default_language', 'en');
Config::set('default_controller', 'filemanager');
Config::set('default_action', 'show');

// Database
Config::set('db_host', 'mysql');
Config::set('db_user', 'root');
Config::set('db_password', 'root');
Config::set('db_name', 'filemanager');

// File manager
Config::set('main_path', '../public_ftp');
Config::set('file_hash_function', 'md5');
Config::set('clickable_file_types', ['txt', 'html', 'xml']);
