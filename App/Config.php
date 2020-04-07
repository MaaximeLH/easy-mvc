<?php

namespace App;

class Config
{
    const DB_DRIVER = 'mysql';
    const ORM_DRIVER = 'pdo_mysql';
    const DB_HOST = 'db_host';
    const DB_NAME = 'db_name';
    const DB_USER = 'db_user';
    const DB_PASSWORD = 'db_pass';
    const DB_CHARSET = 'utf8';
    const SHOW_ERRORS = false;
    const DEFAULT_LANGUAGE = "fr_FR";
    const LANGUAGES = ['fr_FR', 'en_US'];
}
