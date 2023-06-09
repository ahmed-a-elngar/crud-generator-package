<?php

    namespace Elngar\CrudGenerator\Services\Generators\Api;

    use Elngar\CrudGenerator\Services\Generators\Generator;
    use Illuminate\Support\Facades\File;

    class FormRequestService extends Generator
    {
        const INJECT_PATH       =   "app/Http/Requests/Api",
              DEFAULT_FILE      =   "FormRequest.php",
              DEFAULT_PATH        =   '\..\..\..\Defaults\Api';


        public function __construct($crud_name, public $prefix)
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
            return $this->prefix . $this->crud_name . 'Request';
        }

        protected function prepareNewContent()
        {
            $this->new_content = str_replace('ClassName', $this->getClassNameWithoutExtension(), File::get($this->getDefaultFilePath()));
            return $this;
        }
    }

    