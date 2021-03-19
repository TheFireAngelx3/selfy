<?php
namespace backend\exceptions;

use backend\abstracts\AbstractException;

class DBException extends AbstractException
{
    protected $template = '503.php';
}
