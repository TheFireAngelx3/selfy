<?php
namespace backend\exceptions;

use backend\abstracts\AbstractException;

class LoginException extends AbstractException
{
    protected $template = 'login.php';

}
