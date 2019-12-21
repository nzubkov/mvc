<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 21.12.2019
 */

namespace tests\RequestTest;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(['base_uri' => 'http://mvc']);
    }

    public function testIndex()
    {
        $result = $this->client->get('/');
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertIsString((string)$result->getBody());
    }
}
