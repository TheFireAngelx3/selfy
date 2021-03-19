<?php
namespace backend\services;

use backend\abstracts\Singleton;

class ViewService extends Singleton
{
    const TEMPLATE_DIR = __DIR__.'/../../frontend/';
    private static $arguments;

    public static function get($argument) {
        if(is_array(self::$arguments)){
            return self::$arguments[$argument];
        }
        return null;
    }

    public function renderTemplate($template, $error = null){
        if($error){
            self::$arguments['error'] = $error;
        }

        ob_start();
        $this->renderHead();
        echo '<body>';
        $this->renderBody($template);
        $this->renderFooter();
        echo '</body>';
        echo '</html>';
        echo ob_get_clean();
    }

    public function renderHead(){
        include_once self::TEMPLATE_DIR .'_inc/head.php';
    }

    public function renderBody($template){
        include self::TEMPLATE_DIR.$template;
    }

    public function renderFooter(){
        include_once self::TEMPLATE_DIR .'_inc/footer.php';
    }

    public static function getTemplateDir(){
        return self::TEMPLATE_DIR;
    }
}
