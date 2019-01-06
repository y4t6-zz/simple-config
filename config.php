<?php

class Config
{
    /**
     * @param $key
     * @param string $fileName
     * @param string $pathToFolder
     * @return null
     * @throws Exception
     */
    public static function item($key, $fileName = 'main', $pathToFolder = '')
    {
        $groupItems = static::file($fileName, $pathToFolder);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    /**
     * @param $fileName
     * @param string $pathToFolder
     * @return mixed
     * @throws Exception
     */
    public static function file($fileName, $pathToFolder = '')
    {
        $pathToFile = $pathToFolder . $fileName . '.php';

        if (file_exists($pathToFile))
        {
            $items = require $pathToFile;

            if (is_array($items))
            {
                return $items;
            }
            else
            {
                throw new Exception(
                    sprintf('Config file <b>%s</b> does not exist.', $pathToFile)
                );
            }
        } else {
            throw new Exception(
                sprintf('Cannot load config from file <b>%s</b> does not exist.', $pathToFile)
            );
        }

    }
}