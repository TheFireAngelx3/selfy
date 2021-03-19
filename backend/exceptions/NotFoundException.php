<?php
namespace backend\exceptions;

use backend\abstracts\AbstractException;
use Throwable;

class NotFoundException extends AbstractException
{
    protected $template = '404.php';

    public function __construct($message = "")
    {
        parent::__construct($message, 404);
    }
}
