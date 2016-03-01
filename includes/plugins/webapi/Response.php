<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class Response
 *
 * Ответ клиенту
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
class Response
{
    /**
     * Возвращает ответ клиенту в JSON формате вида:
     * [
     *     "status" => "good" либо "bad",
     *     дополнительные данные
     * ]
     *
     * @param bool $isGood
     * @param array $data дополнительные данные, которые будут возвращены
     */
    public static function send($isGood, array $data = [])
    {
        $data["status"] = $isGood ? "good" : "bad";

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Возвращает ответ об ошибке клиенту в JSON формате вида:
     * [
     *    "status" => "bad",
     *    "reason" => причина ошибки
     * ]
     * @param string $errorMessage причина ошибки
     */
    public static function sendError($errorMessage)
    {
        self::send(false, ["reason" => $errorMessage]);
    }
}
