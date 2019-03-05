<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:41
 */
namespace models\File;

use models\Model;

class File extends Model
{
    public $fileName;
    public $userId;
    public $content;

    public function __construct($fileData)
    {
        $this->fileName = $fileData['fileName'];
        $this->userId = $fileData['userId'];
        $this->content = $fileData['content'];
    }

    public static function upload($file)
    {
        $uploadDir = '/upload';
        $uploadFile = $uploadDir . basename($file['tmp_name']);
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return new File([
                'fileName' => $file['name'],
                'userId' => $file['userId'],
                'content' => file_get_contents($file['tmp_name'])
            ]);
        } else {
            throw new FileException('Не удалось записать файл.');
        }
    }
}