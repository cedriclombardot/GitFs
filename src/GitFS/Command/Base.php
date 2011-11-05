<?php

namespace GitFS\Command;

use GitFS\Model\RepositoryInterface;

abstract class Base
{
    protected $binPath;

    protected $repository;

    /**
     * @param array $options
     */
    public function __construct(RepositoryInterface $repository, $binPath = '/usr/bin/git')
    {
        $this->repository = $repository;
        $this->binPath = $binPath;
    }

    protected function run()
    {
        $toRun  = 'cd '.$this->getRepository()->getPath().' && ';
        $toRun .= $this->binPath.' '.$this->getCommand();

        exec($toRun, $output);

        return $output;
    }

    protected function getRepository()
    {
        return $this->repository;
    }
}