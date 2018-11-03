<?php
/**
 * Appointment: Папки
 * Description: Предназначен для работы с папками
 * File: Folder.php
 * Version: 0.0.2
 * Author: Anton Kuleshov
 **/

namespace Falbar\Skeleton;

/**
 * Class Folder
 * @package Skeleton
 */
class Folder
{
    /**
     * Получение содержимого папки
     * @param string $sPath
     * @param string $sType
     * @param array $arExceptions
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