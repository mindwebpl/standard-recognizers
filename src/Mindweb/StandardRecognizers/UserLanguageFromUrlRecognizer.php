<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class UserLanguageFromUrlRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        if ($attributionEvent->getRequest()->query->has('ul')) {
            $attributionEvent->attribute('ua', $attributionEvent->getRequest()->query->get('ul'));
        }
    }
}