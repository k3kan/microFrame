<?php

namespace controllers;

class BaseController
{
    protected function render($template, $variables = [])
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view';
        $class = get_class($this);
        $classname = (new \ReflectionClass($this))->getShortName();

        $folderName = strtolower(preg_replace("/Controller/", '', $classname));
        $pathFilename = $path . DIRECTORY_SEPARATOR . $folderName .  DIRECTORY_SEPARATOR . $template . '.phtml';

        if (file_exists($pathFilename)) {
            extract($variables);
            ob_start();
            require_once $pathFilename;
            return ob_get_clean();
        }
    }
}