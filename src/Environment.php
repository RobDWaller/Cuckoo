<?php

$dotenv = new Dotenv\Dotenv(defined('CUCKOO_ENV') ? CUCKOO_ENV : __DIR__ . '/../');
$dotenv->load();
