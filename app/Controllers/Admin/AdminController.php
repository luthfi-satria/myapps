<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\JwtAuthenticate;
use CodeIgniter\API\ResponseTrait;

class AdminController extends BaseController
{
    use ResponseTrait;
    var $user;

    function __construct()
    {
        $this->user = JwtAuthenticate::Verify();
    }
}
