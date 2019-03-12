<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 11.03.2019
 * Time: 22:21
 */

namespace helpers;


class FileUploader
{
    public static function upload($file = [], $uploadDir = '/upload')
    {
        $uploadFile = $uploadDir . basename($file['tmp_name']);
        return move_uploaded_file($file['name'], $uploadFile);
    }
}