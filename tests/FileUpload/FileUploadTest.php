<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 21.12.2019
 */
namespace tests\FileUpload;
session_start();
require dirname(dirname(__DIR__)) . './constants.php';
require ROOT_DIR . 'vendor/autoload.php';

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class FileUploadTest extends TestCase
{
    /**
     * @var Client $http
     */
    private $http;

    private $rootDir;
    private $uploadDir;

    public function setUp(): void
    {
        parent::setUp();
        $_SESSION = [];
        $this->http = new Client(['base_uri' => 'http://loftschool/', 'cookies' => true]);
        $this->rootDir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR;
        $this->uploadDir = $this->rootDir . 'uploads' . DIRECTORY_SEPARATOR;
    }

    public function testUpload()
    {
        $url = '/mvc/file/upload';
        $fileName = 'image.jpg';
        $filePath = __DIR__. DIRECTORY_SEPARATOR . $fileName;
        $fileContent = file_get_contents($filePath);
        $request = $this->http->post($url, [
            'XDEBUG_SESSION_START' => 'PHPSTORM',
            'userId' => 1,
            'multipart' => [
                [
                    'name' => 'uploads',
                    'contents' => $fileContent,
                    'filename' => end(explode('/', $filePath)),
                ],
            ],
            'debug' => true
        ]);
        $this->assertEquals('200', $request->getStatusCode());
        $this->assertFileExists(UPLOAD_DIR . $fileName);
    }
}
