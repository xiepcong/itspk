<?php

/**
 * Created by PhpStorm.
 * User: xiecong
 * Date: 19/4/27
 * Time: 11:19
 */

namespace App\Common\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;

/**
 * 单例 一次请求中所有出现使用jwt的用户都是同一个
 * Class JwtAuth
 */
class JwtAuth
{

    private $token;

    private $iss = 'api.test.com';

    private $aud = 'ring_admin_api';

    private $uid;

    private $decodeToken;

    private $secret = '$@fe23e1*@232fddsdjojs!@$';

    private static $instance;


    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


    /**
     * 获取token
     * @return string
     */
    public function getToken() {
        return (string)$this->token;
    }


    /**
     * 设置token
     * @param $token
     * @return $this
     */
    public function setToken($token) {
        $this->token = $token;
        return $this;
    }

    /**
     * 设置 uid
     * @param $uid
     * @return $this
     */
    public function setUid($uid) {
        $this->uid = $uid;
        return $this;
    }


    /**
     *
     * @return $this
     */
    public function encode() {
        $time = time();
        $this->token = (new Builder())->setHeader('alg', 'HS256')
            ->setIssuer($this->iss)
            ->setAudience($this->aud)
            ->setIssuedAt($time)
            ->setExpiration($time + 7200)
            ->set('uid', $this->uid)
            ->sign(new Sha256(), $this->secret)
            ->getToken();

        return $this;
    }


    /**
     * 获取
     * @return \Lcobucci\JWT\Token
     */
    public function decode() {
        if (!$this->decodeToken) {
            $this->decodeToken = (new Parser())->parse((string)$this->token);
            $this->uid  = $this->decodeToken->getClaim('uid');
        }
        return $this->decodeToken;
    }


    /**
     * 验证签名
     * @return bool
     */
    public function verify() {
        return $this->decode()->verify(new Sha256(), $this->secret);
    }

    /**
     * 验证信息
     * @return bool
     */
    public function validate() {
        $data = new ValidationData();
        $data->setAudience($this->aud);
        $data->setIssuer($this->iss);

        return $this->decode()->validate($data);
    }



}