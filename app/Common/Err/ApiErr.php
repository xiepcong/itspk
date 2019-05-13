<?php

namespace App\Common\Err;
/**
 * Created by PhpStorm.
 * User: xiecong
 * Date: 19/4/27
 * Time: 23:26
 */
class ApiErr
{
    const SUCCESS = [0, '成功'];

    const UNKNOWN_ERR = [1, '未知错误'];

    const ERR_PARAMS = [100, '参数缺失'];



    const ERR_PASSWORD = [1001, '密码错误'];

    const ERR_EXPIRE    = [1002, '登录过期'];
}