<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:41
 */
namespace models\File;

use helpers\FileUploader;
use models\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $fillable = ['name','user_id'];

    public function __construct($fileData)
    {
        $this->name = $fileData['name'];
        $this->user_id = $fileData['userId'];
    }

    /** Функция загрузки файлов на сервер, сохраняет информацию о файле в БД после загрузки
     *
     * @param int $userId - id пользователя, загружаюшего файл
     * @param array $file - информация о загружаемом файле
     * @throws FileException
     */

    public static function upload(int $userId, array $file)
    {
        if(empty($userId)) {
            $userId = $_SESSION['user_id'];
        }
        if (FileUploader::upload($file)) {
            $file = new Files(['name' => $file['name'], 'userId' => $userId]);
            $file->save();
        } else {
            throw new FileException('Не удалось записать файл.');
        }
    }

    public static function getAll(int $userId = 0, string $sort = 'desc')
    {
        if(!empty($userId)){
            $files = self::where('user_id', $userId)->orderBy('name', $sort)->get();
        } else {
            $files = self::orderBy('name', $sort)->get();
        }
        return $files;

    }
}