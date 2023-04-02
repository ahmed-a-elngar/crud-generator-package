<?php

namespace Elngar\CrudGenerator\Services\Generators;

use Illuminate\Support\Facades\File;

abstract class Generator
{
    const POSTFIX_WITH_DOT  =   '.php',
        SEPARATOR           =   '/',
        DEFAULT_PATH        =   '\..\..\Defaults',
        INJECT_PATH         =   "";

    protected $new_content;

    public function __construct(public $crud_name)
    {
    }

    public function checkAndCreateFile()
    {
        if (!File::exists($this->getNewFilePathWithExtension())) {
            $this->prepareNewContent()->checkAndCreateFolder()->createNewFile();
        }
    }

    public function getClassNameWithExtension()
    {
        return $this->getClassNameWithoutExtension() . static::POSTFIX_WITH_DOT;
    }

    protected function createNewFile()
    {
        File::put($this->getNewFilePathWithExtension(), $this->new_content);
    }

    protected function checkAndCreateFolder()
    {
        if (!File::isDirectory(static::INJECT_PATH)) {
            File::makeDirectory(static::INJECT_PATH, 0777, true, true);
        }
        return $this;
    }

    abstract public function getNewFilePathWithExtension();
    abstract public function getDefaultFilePath();
    abstract public function getClassNameWithoutExtension();
    abstract protected function prepareNewContent();
}
