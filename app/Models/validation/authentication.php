<?php
namespace App\Models\validation;

class Authentication{
    static function LoginRules() {
        return [
            'email' => 'required|valid_email|min_length[5]',
            'password' => 'required|min_length[5]',
        ];
    }
}