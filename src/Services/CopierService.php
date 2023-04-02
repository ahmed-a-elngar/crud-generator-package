<?php

namespace Elngar\CrudGenerator\Services;

use Illuminate\Support\Facades\File;

abstract class CopierService
{
    const INJECT_PATH       =   "",
          DEFAULT_FILE      =   "",
          DEFAULT_PATH      =   "",
          SEPARATOR         =   "/";

    public static function checkAndCreateFile()
    {
        if (!File::exists(static::getNewFilePathWithExtension())) {
            static::checkAndCreateFolder();
            static::copyFile();
        }
    }

    protected static function checkAndCreateFolder()
    {
        if (!File::isDirectory(static::INJECT_PATH)) {
            File::makeDirectory(static::INJECT_PATH, 0777, true, true);
        }
    }

    protected static function copyFile()
    {
        File::copy(static::DEFAULT_PATH . static::SEPARATOR . static::DEFAULT_FILE, static::getNewFilePathWithExtension());
    }

    protected static function getNewFilePathWithExtension()
    {
        return static::INJECT_PATH . static::SEPARATOR . static::DEFAULT_FILE;
    }
}
