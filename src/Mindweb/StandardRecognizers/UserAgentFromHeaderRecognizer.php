<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class UserAgentFromHeaderRecognizer extends Recognizer
{
    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'userAgent',
            $attributionEvent->getRequest()->headers->get('User-Agent')
        );
    }
}