<?php

namespace GitFS\Model;

use GitFS\Command\Cloner as CommandClone;

class BareRepository implements RepositoryInterface
{
    /** The bare repository path **/
    protected $repositoryPath;

    public function __construct($repositoryPath)
    {
        $this->repositoryPath = $repositoryPath;
    }

    public function doClone($cloneTo)
    {
        $cloneCommand = new CommandClone($this);
        $cloneCommand->setDestination($cloneTo);
        return $cloneCommand->execute();
    }

    public function getPath()
    {
        return $this->repositoryPath;
    }
}