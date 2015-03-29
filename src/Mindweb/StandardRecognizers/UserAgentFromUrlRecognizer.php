<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class UserAgentFromUrlRecognizer extends Recognizer
{
    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        if ($attributionEvent->getRequest()->query->has('ua')) {
            $attributionEvent->attribute(
                'userAgent',
                $attributionEvent->getRequest()->query->get('ua')
            );
        }
    }
}