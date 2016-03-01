<?php

namespace RuxeEngine\Plugins\WebAPI;

/**
 * Class Config
 *
 * Конфигурация плагина
 *
 * @author Ахрамеев Денис Викторович (contact@ahrameev.ru)
 * @link http://ahrameev.ru
 * @package RuxeEngine\Plugins\WebAPI
 */
class Config
{
    /**
     * @var string
     */
    protected $confFileName;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        global $cms_root;

        $this->confFileName = $cms_root . "/conf/webapi.json";
    }

    /**
     * Возвращает конфигурацию плагина
     *
     * @return array
     */
    public function get()
    {
        if (! file_exists($this->confFileName)) {
            $this->set(["token" => ""]);
        }

        $file = file($this->confFileName);
        $result = json_decode($file[0], true);
        if (is_null($result)) {
            $this->set(["token" => ""]);
        }

        return $result;
    }

    /**
     * Устанавливает и сохраняет конфигурацию плагина
     *
     * @param array $conf
     */
    public function set(array $conf)
    {
        $file = fopen($this->confFileName, "w");
        fwrite($file, json_encode($conf, JSON_UNESCAPED_UNICODE));
        fclose($file);
        clearstatcache(true, $this->confFileName);
        @chmod($this->confFileName, 0666);
    }
}
