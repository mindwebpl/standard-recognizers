<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class RecRequiredRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     * @throws Exception\RecParameterIsRequiredException
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        if (!$attributionEvent->getRequest()->query->has('rec')) {
            throw new Exception\RecParameterIsRequiredException();
        }
    }
}