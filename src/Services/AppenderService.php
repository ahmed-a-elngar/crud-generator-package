<?php

namespace Elngar\CrudGenerator\Services;

use Illuminate\Support\Facades\File;

abstract class AppenderService
{
    protected $fromFile, $toFile, $targetText, $flag, $offset, $firstOccurrence, $appendedText;

    public function __construct(protected $crud_name = "")
    {
        
    }

    public function appendFromFile($fromFile, $toFile, $flag, $firstOccurrence = true)
    {
        $this->construct($fromFile, $toFile, $flag, $firstOccurrence, "")
            ->getText()
            ->getTarget()
            ->getOffset()
            ->appendToFile();
    }

    public function appendFromText($appendedText, $toFile, $flag, $firstOccurrence = true)
    {
        $this->construct("", $toFile, $flag, $firstOccurrence, $appendedText)
            ->getTarget()
            ->getOffset()
            ->appendToFile();
    }

    protected function construct($fromFile, $toFile, $flag, $firstOccurrence, $appendedText)
    {
        $this->fromFile = $fromFile;
        $this->toFile = $toFile;
        $this->flag = $flag;
        $this->firstOccurrence = $firstOccurrence;
        $this->appendedText = $appendedText;

        return $this;
    }

    protected function getText()
    {
        $this->appendedText = File::get($this->fromFile);
        return $this;
    }

    protected function getTarget()
    {
        $this->targetText = File::get($this->toFile);
        return $this;
    }

    protected function getOffset()
    {
        if ($this->firstOccurrence) {
            $this->getFirstOccurrence($this->flag);
        } else {
            $this->getLastOccurrence($this->flag);
        }
        return $this;
    }

    protected function getFirstOccurrence()
    {
        $this->offset = stripos($this->targetText, $this->flag);
    }

    protected function getLastOccurrence()
    {
        $this->offset = strripos($this->targetText, $this->flag);
    }

    protected function appendToFile()
    {
        File::put($this->toFile, substr_replace($this->targetText, "\n" . $this->appendedText, $this->offset + 1, 0));
    }

    abstract public function generate();
}
