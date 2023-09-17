<?php namespace Akbsit\Skeleton;

/**
 * Class Folder
 * @package Akbsit\Skeleton
 */
class Folder
{
    /**
     * @param string $sPath
     * @param string $sType
     * @param array  $arExceptions
     *
     * @return array
     */
    public static function scan($sPath = '.', $sType = '*', $arExceptions = [])
    {
        $arTmp = [];

        $arFileList = scandir($sPath);

        if ($arFileList && count($arFileList) > 2) {
            foreach ($arFileList as $sFile) {
                if ($sFile === '.' || $sFile === '..' || in_array($sFile, $arExceptions)) {
                    continue;
                } else {
                    if ($sType === '*') {
                        $arTmp[] = $sFile;
                    } elseif ($sType === 'folder') {
                        if (is_dir($sPath . '/' . $sFile)) {
                            $arTmp[] = $sFile;
                        }
                    } elseif ($sType === 'files') {
                        if (is_file($sPath . '/' . $sFile)) {
                            $arTmp[] = $sFile;
                        }
                    }
                }
            }
        }

        return $arTmp;
    }
}
