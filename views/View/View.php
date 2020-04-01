<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 13:36
 */
namespace views\View;

use \Twig\Environment;
use Twig\Error\Error;
use \Twig\Loader\FilesystemLoader;
use Twig_Error;

class View
{
    const PATH_TO_TEMPLATES = ROOT_DIR . '/views/templates';
    private $templateEngine;

    public function __construct()
    {
        $this->templateEngine = new Environment(new FilesystemLoader(self::PATH_TO_TEMPLATES), [
            'cache' => false,
        ]);
    }

    public function render($path, $data = [])
    {
        try {
            $path = (stristr($path, '.html')) ? $path : "$path.html";
            $result = $this->templateEngine->render($path, !empty($data) ? $data : []);
        } catch (Error $exception) {
            $result = $exception->getMessage();
        }
        return $result;
    }
}
