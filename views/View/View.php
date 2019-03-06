<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 13:36
 */
namespace views\View;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;
use Twig_Error;

class View
{
    const PATH_TO_TEMPLATES = ROOT_DIR . '/views/templates';
    private $template;
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
            return $this->template = $this->templateEngine->render($path, !empty($data) ? $data : []);
        } catch (Twig_Error $exception) {
            throw new ViewException($exception->getMessage());
        }
    }
}
