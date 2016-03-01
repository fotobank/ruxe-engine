<?php

namespace RuxeEngine\Plugins\WebAPI;

class Response
{
    public static function send($isGood, array $data = [])
    {
        $data["status"] = $isGood ? "good" : "bad";

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public static function sendError($errorMessage)
    {
        self::send(false, ["reason" => $errorMessage]);
    }
}
