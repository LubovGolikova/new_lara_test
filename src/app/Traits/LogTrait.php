<?php

namespace App\Traits;
use Exception;

trait LogTrait
{
    /**
     * @param string $message
     * @param Exception $e
     */
    public function customLog(string $message, Exception $e)
    {
        return  \Log::emergency($message . $e->getFile() . $e->getLine() . $e->getMessage());
    }
}
