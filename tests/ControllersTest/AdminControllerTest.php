<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 21.12.2019
 */
session_start();
require dirname(dirname(__DIR__)) . './constants.php';
require ROOT_DIR . 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use \controllers\AdminController;

class AdminControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $_SESSION = [];
    }

    public function testIndex()
    {
        $controller = new AdminController();
        $_SESSION['auth'] = 1;
        $_SESSION['isAdmin'] = true;
        $controller->index();
        $template = $controller->getView();
        $this->assertStringContainsStringIgnoringCase('Панель администрирования', $template);
        $this->assertInstanceOf( AdminController::class, $controller);
    }
}
