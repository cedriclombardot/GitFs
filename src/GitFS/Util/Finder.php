<?php

namespace GitFS\Util;

use GitFS\Command\LsTree;
use GitFS\Model\Repository;
use GitFS\Model\FilesCollection;

class Finder
{
    protected $FilesCollection;

    protected $repository;

    protected $dirs = array();

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function in($dirs)
    {
        $dirs = (array) $dirs;

        $this->dirs = array_merge($this->dirs, $dirs);

        return $this;
    }

    public function search()
    {
        $lsTree = new LsTree($this->repository);

        $this->FilesCollection = new FilesCollection();

        foreach ($this->dirs as $dir) {
            $lsTree->setBasePath($dir);
            $results = $lsTree->execute();

            foreach($results->getFiles() as $file) {
                $this->FilesCollection->addFile($file);
            }

            foreach($results->getDirectories() as $file) {
                $this->FilesCollection->addDirectory($file);
            }
        }

        return $this->FilesCollection;
    }

}