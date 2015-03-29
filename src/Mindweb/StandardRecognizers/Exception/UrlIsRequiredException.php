<?php
namespace Mindweb\StandardRecognizers\Exception;

use Exception;

class UrlIsRequiredException extends Exception
{
    public function __construct()
    {
        parent::__construct('Url parameter is required.');
    }
} 