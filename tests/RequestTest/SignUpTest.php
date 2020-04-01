<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 29.03.2020
 */

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
require dirname(dirname(__DIR__)) . './constants.php';
require ROOT_DIR . 'vendor/autoload.php';
class SignUpTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(['base_uri' => 'http://mvc']);
    }

    public function testSignUp()
    {
        $result = $this->client->request( 'POST', '/user/signup', [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'XDEBUG_SESSION_START' => 'PHPSTORM',
            'name' => 'Nikolay',
            'debug' => true
        ]);
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertIsString((string)$result->getBody());
    }
}
