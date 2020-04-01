<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 29.03.2020
 */

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testDataNotEmpty()
    {
        $data = [1,2,3];
        $this->assertNotEmpty($data);
    }
}
