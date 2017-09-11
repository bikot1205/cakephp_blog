<?php

namespace App\I18n\Parser;

class YamlFileParser
{

    public function parse($file)
    {
        return yaml_parse_file($file);
    }
}