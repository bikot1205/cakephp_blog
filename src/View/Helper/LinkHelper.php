<?php

namespace App\View\Helper;

use Cake\View\Helper;

class LinkHelper extends Helper
{
    public $helpers = ['Html'];

    public function makeEdit($title, $url)
    {
        // 出力に HTML ヘルパーを使用
        // 整形されたデータ:

        $link = $this->Html->link($title, $url, ['class' => 'edit']);
        return '<div class="editOuter">' . $link . '</div>';
    }

    public function getElement($helptext) {
        echo $this->_View->element(
            'helpbox',
            ['helptext' => $helptext]
        );
    }
}