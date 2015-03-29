<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class ReturningFromUrlRecognizer extends Recognizer
{
    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'isReturning',
            $attributionEvent->getRequest()->get('returning') === '1'
        );
    }
}