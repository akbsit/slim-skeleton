<?php namespace Akbsit\Skeleton;

/**
 * Class Env
 * @package Akbsit\Skeleton
 */
class Env
{
    /* @var array */
    private static $arLocalSubDomains = ['loc', 'local'];

    /* @var array */
    private static $arPath = ['local' => '', 'production' => ''];

    /* @var array */
    private static $arRequiredParams = [
        'APP_NAME',
        'APP_CHARSET',
        'APP_LOCAL',
        'APP_DEBUG',
    ];

    /* @return bool */
    public static function isLocal()
    {
        $sDomain = pathinfo($_SERVER['PWD'] ?? $_SERVER['HTTP_HOST'], PATHINFO_EXTENSION);

        return in_array($sDomain, self::$arLocalSubDomains);
    }

    /* @return array */
    public static function getLocalConfigs()
    {
        return self::getConfigs(self::$arPath['local']);
    }

    /* @return array */
    public static function getProductionConfigs()
    {
        return self::getConfigs(self::$arPath['production']);
    }

    /**
     * @param string $sPath
     *
     * @return bool
     */
    public static function setLocalPath($sPath = '')
    {
        if (empty($sPath)) {
            return false;
        }

        self::$arPath['local'] = $sPath;

        return true;
    }

    /**
     * @param string $sPath
     *
     * @return bool
     */
    public static function setProductionPath($sPath = '')
    {
        if (empty($sPath)) {
            return false;
        }

        self::$arPath['production'] = $sPath;

        return true;
    }

    /**
     * @param string $sFileData
     *
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
     * @param string $sPath
     *
     * @return array
     */
    private static function getConfigs($sPath = '')
    {
        $iError = 0;
        $arTmp = [];

        if ($sPath && file_exists($sPath)) {
            $arConfigs = self::parseFileConfig(file_get_contents($sPath));

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
