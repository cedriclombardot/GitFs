<?php

namespace GitFS\Model;

use GitFS\Command\Log as CommandLog;
use GitFS\Command\CatFile;

class File
{
    protected $repository;

    protected $chmod;

    protected $objectHash;

    protected $path;

    protected $base_path;

    public function __construct(RepositoryInterface $repository, $chmod, $objectHash, $path, $base_path)
    {
        $this->repository = $repository;
        $this->chmod = $chmod;
        $this->objectHash = $objectHash;
        $this->path = $path;
        $this->base_path = ('' == $base_path) ? '.'  : $base_path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->path;
    }

	/**
     * @return GitFS\Model\Log
     */
    public function getLastLog()
    {
        $logCommand = new CommandLog($this->repository);
        $logCommand->setBasePath($this->base_path.'/'.$this->path);

        return $logCommand->execute();
    }

    public function getContent()
    {
        $catFile = new CatFile($this->repository);
        $catFile->setHash($this->objectHash);
        return $catFile->execute();
    }
}