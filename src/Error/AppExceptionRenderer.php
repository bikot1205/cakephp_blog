<?php

namespace App\Error;

use Cake\Error\ExceptionRenderer;

class AppExceptionRenderer extends ExceptionRenderer
{
    
    public function missingWidget($error)
    {
        debug($error);
        return 'おっとウィジェットが見つからない！';
    }
    /*
    protected function _getController($exception)
    {
        debug($exception);
        //return new SuperCustomErrorController();
    }*/
}