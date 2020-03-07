<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 13:51
 */

if (!defined('ROOT_DIR')){
    define('ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR);
}
const UPLOAD_DIR_NAME = 'uploads';

if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', ROOT_DIR . UPLOAD_DIR_NAME . DIRECTORY_SEPARATOR);
}