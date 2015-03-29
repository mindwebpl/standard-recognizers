<?php
namespace Mindweb\StandardRecognizers\Exception;

use Exception;

class RecParameterIsRequiredException extends Exception
{
    public function __construct()
    {
        parent::__construct('Rec parameter is required.');
    }
} 