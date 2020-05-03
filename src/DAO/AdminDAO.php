<?php

namespace Blog\src\DAO;

use Blog\config\Parameter;

class AdminDAO extends DAO
{
    public function login(Parameter $post)
    {
        $sql = 'SELECT pseudo, password FROM admin';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        //return false
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

}