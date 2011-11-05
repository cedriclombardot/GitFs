<?php

namespace GitFS\Command;

use GitFS\Model\FilesCollection;
use GitFS\Model\File;
use GitFS\Model\Directory;

class LsTree extends Base
{
    protected $base_path = '';

    public function execute()
    {
        $results = $this->run();
        $FilesCollection = new FilesCollection;

        foreach ($results as $ltree) {
            //100644 blob 214e4119653f9c6a4c48cd0ebb06a6754f00f62b	web/robots.txt
            list($mode, $blob, $hash, $file) = explode(' ', str_replace('	', ' ', $ltree));
            $file = $this->base_path ? str_replace($this->base_path.'/','', $file) : $file;

            if (strstr($file, '/')) {
                list($dir, $other) = explode('/', $file, 2);
                $dirObject = new Directory($this->getRepository(), $mode, $hash, $dir, $this->base_path);
                $FilesCollection->addDirectory($dirObject);

            } else {
                $fileObject = new File($this->getRepository(), $mode, $hash, $file, $this->base_path);
                $FilesCollection->addFile($fileObject);
            }
        }

        return $FilesCollection;
    }

    public function setBasePath($base_path)
    {
        $this->base_path = $base_path;
    }

    protected function getCommand()
    {
        return 'ls-tree --full-tree '.$this->getRepository()->getBranch().' -r '.$this->getRepository()->getPath().'/'.$this->base_path;
    }
}