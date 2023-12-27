<?php
namespace App\Services;

class CoreService{
    var $db;
    var $input;
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->input = \Config\Services::request();
    }
}