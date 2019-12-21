<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 21.12.2019
 */
require dirname(dirname(__DIR__)) . './constants.php';
require ROOT_DIR . 'autoloader.php';
use PHPUnit\Framework\TestCase;
use \controllers\IndexController;

class IndexControllerTest extends TestCase
{
    public function setUp(): void
    {
      parent::setUp();
      $_SESSION = [];
    }
    public function testIndex()
    {
        $controller = new IndexController();
        $controller->index();
        $template = $controller->getView();
        $this->assertIsString($template);
        $this->assertInstanceOf( IndexController::class, $controller);
    }
}
