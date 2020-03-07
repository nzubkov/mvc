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
    public static function upload($file = [], $uploadDir = '/uploads/')
    {
        $uploadPath = UPLOAD_DIR . $file['name'];
        return move_uploaded_file($file['tmp_name'], $uploadPath);
    }
}