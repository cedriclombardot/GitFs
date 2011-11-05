<?php

namespace GitFS\Model;

class FilesCollection
{

    protected $files = array();

    protected $direcories = array();

    public function addFile(File $file)
    {
        $this->files[$file->getPath()] = $file;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function addDirectory(Directory $directory)
    {
        $this->direcories[$directory->getPath()] = $directory;
    }

    public function getDirectories()
    {
        return $this->direcories;
    }

    public function getFileByPath($path)
    {
        return isset($this->files[$path]) ? $this->files[$path] : false;
    }

}