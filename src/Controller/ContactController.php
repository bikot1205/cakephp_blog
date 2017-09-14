<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{
    public function index()
    {
        $contact = new ContactForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('すぐにご連絡いたします。');
            } else {
                $this->Flash->error('フォーム送信に問題がありました。');
            }
        }

        if ($this->request->is('get')) {
            // たとえばユーザーモデルの値
            $this->request->data('name', 'John Doe');
            $this->request->data('email','john.doe@example.com');
        }

        $this->set('contact', $contact);
    }
}
