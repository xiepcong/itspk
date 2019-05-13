<?php

/**
 * Created by PhpStorm.
 * User: xiecong
 * Date: 19/4/27
 * Time: 11:46
 */


namespace App\Http\Response;


trait ResponseJson
{


    /**
     * @param $code
     * @param $message
     * @param array $data
     * @return string
     */
    public function jsonData($code, $message, $data = []) {
        return $this->jsonResponse($code, $message, $data);
    }

    /**
     *
     * @param array $data
     * @return string
     */
    public function jsonSuccessData($data = []) {
        return $this->jsonResponse(0, '操作成功', $data);
    }

    /**
     *
     * @param $code
     * @param $message
     * @param $data
     */
    private function jsonResponse($code, $message, $data)
    {
        $content = [
            'result' => $code,
            'msg'   => $message,
            'data'  => $data
        ];

        return response()->json($content);
    }

}