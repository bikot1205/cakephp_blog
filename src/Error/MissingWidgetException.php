<?php

namespace App\Error;

use Cake\Core\Exception\Exception;

class MissingWidgetException extends Exception
{
    protected $_messageTemplate = '%s が見当たらないようです。';
}
