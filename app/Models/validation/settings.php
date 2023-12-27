<?php
namespace App\Models\validation;

class Settings{
    static function Update() {
        return [
            'ckey' => 'required|alpha',
            'name' => 'required|alpha_space|min_length[5]',
            'cval' => 'required',
            'description' => 'required'
        ];
    }
}