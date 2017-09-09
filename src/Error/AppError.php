<?php

namespace App\Error;

use Cake\Error\BaseErrorHandler;

class AppError extends BaseErrorHandler
{
    public function _displayError($error, $debug)
    {
        echo 'エラーがありました！';
    }
    public function _displayException($exception)
    {
        echo '例外がありました！';
    }
    public function handleFatalError($code, $description, $file, $line)
    {
        return '致命的エラーが発生しました';
    }

}