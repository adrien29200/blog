<?php

namespace Blog\src\DAO;

use Blog\config\Parameter;

class AdminDAO extends DAO
{
    public function login(Parameter $post)
    {
        $sql = 'SELECT admin.pseudo, admin.password FROM admin';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE admin SET password = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

}