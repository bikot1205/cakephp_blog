<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->to($user->username)
            ->subject(sprintf('Welcome %s', $user->username))
            ->set(['username' => $user->username])
            ->template('welcome', 'default'); // デフォルトでテンプレートはメソッドと同じ名前が使われます。
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}
