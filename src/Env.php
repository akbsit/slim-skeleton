<?php
/**
 * Appointment: Среда выполнения
 * Description: Предназначен для определения среды выполнения скрипта (local, production) и получения настроек $arRequiredParams из файлов .env расположенных в $arPath
 * File: Env.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

namespace Skeleton;

/**
 * Class Env
 * @package Skeleton
 */
class Env
{
    /**
     * Поддомены локальной среды
     * @var array
     */
    private static $arLocalSubDomains = [
        'loc',
        'local'
    ];

    /**
     * Пути до файлов настроек
     * @var array
     */
    private static $arPath = [
        'local' => '',
        'production' => ''
    ];

    /**
     * Обязательный набор настроек
     * @var array
     */
    private static $arRequiredParams = [
        'APP_NAME',
        'APP_CHARSET',
        'APP_LOCAL',
        'APP_DEBUG'
    ];

    /**
     * Определение локальной среды
     * @return bool
     */
    public static function isLocal()
    {
        return in_array(
            pathinfo(
                $_SERVER['PWD'] ?? $_SERVER['HTTP_HOST'],
                PATHINFO_EXTENSION
            ),
            self::$arLocalSubDomains
        );
    }

    /**
     * Получение настроек локальной среды
     * @return array
     */
    public static function getLocalConfigs()
    {
        return self::getConfigs(self::$arPath['local']);
    }

    /**
     * Получение настроек боевой среды
     * @return array
     */
    public static function getProductionConfigs()
    {
        return self::getConfigs(self::$arPath['production']);
    }

    /**
     * Установка пути до локальных настроек
     * @param string $sPath
     * @return bool
     */
    public static function setLocalPath($sPath = '')
    {
        if ($sPath) {
            self::$arPath['local'] = $sPath;

            return true;
        }

        return false;
    }

    /**
     * Установка пути до боевых настроек
     * @param string $sPath
     * @return bool
     */
    public static function setProductionPath($sPath = '')
    {
        if ($sPath) {
            self::$arPath['production'] = $sPath;

            return true;
        }

        return false;
    }

    /**
     * Парсинг строки с настройками
     * @param string $sFileData
     * @return array
     */
    private static function parseFileConfig($sFileData = '')
    {
        $arTmp = [];

        if ($sFileData) {
            $arFileData = explode("\n", $sFileData);

            foreach ($arFileData as $sFileDataItem) {
                if (trim($sFileDataItem)) {
                    $arFileDataItem = explode('=', $sFileDataItem);

                    $sName = trim($arFileDataItem[0]);
                    $sValue = trim($arFileDataItem[1]);

                    if ($sValue === 'true') {
                        $arTmp[$sName] = true;
                    } else if ($sValue === 'false') {
                        $arTmp[$sName] = false;
                    } else {
                        $arTmp[$sName] = $sValue;
                    }
                }
            }
        }

        return $arTmp;
    }

    /**
     * Получение настроек из файла
     * @param string $sPath
     * @return array
     */
    private static function getConfigs($sPath = '')
    {
        $iError = 0;
        $arTmp = [];

        if ($sPath && file_exists($sPath)) {
            $arConfigs = self::parseFileConfig(
                file_get_contents($sPath)
            );

            if ($arConfigs && count($arConfigs) === count(self::$arRequiredParams)) {
                foreach ($arConfigs as $sConfigCode => $sConfigItem) {
                    if (!in_array($sConfigCode, self::$arRequiredParams)) {
                        $iError++;
                    }
                }

                if (!$iError) {
                    $arTmp = $arConfigs;
                }
            }
        }

        return $arTmp;
    }
}