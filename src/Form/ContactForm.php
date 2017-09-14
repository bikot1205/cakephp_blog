<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minLength', 3],
                'message' => 'Name need to be at least 3 characters long',
            ])->add('email', 'format', [
                'rule' => 'email',
                'message' => '有効なメールアドレスが要求されます',
            ]);
    }

    protected function _execute(array $data)
    {
        // メールを送信する
        return true;
    }
}