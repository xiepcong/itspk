<?php

namespace App\Http\Controllers;

use App\Http\Response\ResponseJson;
use App\Common\Auth\JwtAuth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ResponseJson;

    public function index() {


    }


    public function login() {
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
        return $this->jsonSuccessData([
            'token' => $token
        ]);
    }


    public function getInfo() {
        echo 11;
    }
}
