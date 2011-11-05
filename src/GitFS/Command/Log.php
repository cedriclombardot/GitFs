<?php

namespace GitFS\Command;

use GitFS\Model\Log as LogModel;

class Log extends Base
{
    const PRETTY_FORMAT='\'{ "message": "%s", "author_email": "%ae", "author_name": "%an", "hash": "%H", "relative_date": "%ar" }\'';

    protected $base_path = '';

    public function execute()
    {
        $results = $this->run();

        if (0 == count($results)) {
            return;
        }

        $results = json_decode($results[0]);

        $log = new LogModel();
        $log->setMessage($results->message);
        $log->setAuthorEmail($results->author_email);
        $log->setAuthorName($results->author_name);
        $log->setHash($results->hash);
        $log->setRelativeDate($results->relative_date);

        return $log;
    }

    public function setBasePath($base_path)
    {
        $this->base_path = $base_path;
    }

    /**
     * Option	Description of Output
        %H	Commit hash
        %h	Abbreviated commit hash
        %T	Tree hash
        %t	Abbreviated tree hash
        %P	Parent hashes
        %p	Abbreviated parent hashes
        %an	Author name
        %ae	Author e-mail
        %ad	Author date (format respects the –date= option)
        %ar	Author date, relative
        %cn	Committer name
        %ce	Committer email
        %cd	Committer date
        %cr	Committer date, relative
        %s	Subject
    */
    protected function getCommand()
    {
        return 'log '.$this->getRepository()->getBranch().' --pretty=format:'.self::PRETTY_FORMAT.' -1 '.$this->base_path;
    }
}