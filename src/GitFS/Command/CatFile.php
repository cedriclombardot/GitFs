<?php

namespace GitFS\Command;

class CatFile extends Base
{
    protected $hash;

    public function execute()
    {
        $fileContent = $this->run();

        return implode("\n",$fileContent);
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    protected function getCommand()
    {
        return 'cat-file -p '.$this->hash;
    }
}