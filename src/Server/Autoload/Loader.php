<?php
namespace Server\Autoload;
/**
 * Loads source code for this branch
 */
class Loader
{
    const DEFAULT_SRC = __DIR__ . '/../..';
    const COMPOSER_AUTOLOAD = __DIR__ . '/../../../vendor/autoload.php';
    public $src_dir = '';
    public function __construct(string $src_dir = NULL)
    {
        $this->src_dir = $src_dir ?? realpath(self::DEFAULT_SRC);
        spl_autoload_register([$this, 'autoload']);
        require self::COMPOSER_AUTOLOAD;
    }
    public function autoload($class)
    {
        $fn = str_replace('\\', '/', $class);
        $fn = $this->src_dir . '/' . $fn . '.php';
        $fn = str_replace('//', '/', $fn);
        require($fn);
    }
}
