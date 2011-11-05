<?php

namespace GitFS\Model;

use GitFS\Command\Log as CommandLog;

class Repository implements RepositoryInterface
{
    /** The repository path (note bare repo) **/
    protected $repositoryPath;

    protected $branch = 'master';

    public function __construct($repositoryPath)
    {
        $this->repositoryPath = $repositoryPath;
    }

    public function getBranch()
    {
        return $this->branch;
    }

    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return GitFS\Model\Log
     */
    public function getLastLog()
    {
        $logCommand = new CommandLog($this);
        return $logCommand->execute();
    }

    public function getPath()
    {
        return $this->repositoryPath;
    }
}