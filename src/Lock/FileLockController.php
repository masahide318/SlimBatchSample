<?php

namespace Batch\Sample\Lock;

class FileLockController
{
    private $lockFilePath;

    /**
     * FileLockController constructor.
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->lockFilePath = '/tmp/'.$fileName.'.lock';
    }
    
    public function lock()
    {
        touch($this->lockFilePath);
    }
    
    public function unLock()
    {
        unlink($this->lockFilePath);
    }
    public function isLocking()
    {
        return file_exists($this->lockFilePath);
    }
}
