<?php
namespace App\Services;

class CoreService{
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }
}