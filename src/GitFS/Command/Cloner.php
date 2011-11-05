<?php

namespace GitFS\Command;

class Cloner extends Base
{
    protected $destination;

    public function execute()
    {
        $this->run();

        return new Repository($this->destination);
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    protected function getCommand()
    {
        return 'clone '.$this->getRepository()->getPath().' '.$this->destination;
    }
}