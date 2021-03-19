<?php
namespace backend\abstracts;


class AbstractException extends \Exception
{
    protected $template;

    public function getTemplate(){
        return $this->template;
    }
}
