<?php

    namespace Elngar\CrudGenerator\Services\Generators\Api;

    use Elngar\CrudGenerator\Services\Generators\Generator;
    use Illuminate\Support\Facades\File;

    class ControllerService extends Generator
    {
        const INJECT_PATH       =   "app/Http/Controllers/Api",
              DEFAULT_FILE      =   "Controller.php",
              DEFAULT_PATH      =   '\..\..\..\Defaults\Api';


        public function __construct($crud_name)
        {
            parent::__construct($crud_name);
        }

        public function getNewFilePathWithExtension()
        {
            return static::INJECT_PATH . static::SEPARATOR . $this->getClassNameWithExtension();
        }

        public function getDefaultFilePath()
        {
            return __DIR__ . static::DEFAULT_PATH . static::SEPARATOR . static::DEFAULT_FILE;
        }

        public function getClassNameWithoutExtension()
        {
            return $this->crud_name . 'Controller';
        }

        protected function prepareNewContent()
        {
            $this->new_content = str_replace('ClassName', $this->getClassNameWithoutExtension(), File::get($this->getDefaultFilePath()));
            $this->new_content = str_replace('ModelName', $this->crud_name, $this->new_content);
            $this->new_content = str_replace('ResourceName', $this->crud_name . 'Resource', $this->new_content);
            $this->new_content = str_replace('StoreRequestName', 'Store'. $this->crud_name . 'Request', $this->new_content);
            $this->new_content = str_replace('UpdateRequestName', 'Update'. $this->crud_name . 'Request', $this->new_content);

            return $this;
        }
    }

    