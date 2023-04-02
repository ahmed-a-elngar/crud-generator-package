<?php

    namespace Elngar\CrudGenerator\Services\Generators;

    use Illuminate\Support\Facades\File;

    class ModelService extends Generator
    {
        const INJECT_PATH       =   "app/models",
              DEFAULT_FILE      =   "Model.php";


        public function __construct($crud_name)
        {
            parent::__construct($crud_name);
        }

        public function getNewFilePathWithExtension()
        {
            return self::INJECT_PATH . self::SEPARATOR . $this->getClassNameWithExtension();
        }

        public function getDefaultFilePath()
        {
            return __DIR__ . self::DEFAULT_PATH . self::SEPARATOR . self::DEFAULT_FILE;
        }

        public function getClassNameWithoutExtension()
        {
            return $this->crud_name;
        }

        protected function prepareNewContent()
        {
            $this->new_content = str_replace('ClassName', $this->getClassNameWithoutExtension(), File::get($this->getDefaultFilePath()));
            return $this;
        }
    }

    