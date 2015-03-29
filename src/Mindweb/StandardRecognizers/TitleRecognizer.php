<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class TitleRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        if ($attributionEvent->getRequest()->query->has('title')) {
            $attributionEvent->attribute(
                'title',
                $attributionEvent->getRequest()->query->get(('title'))
            );
        }
    }
}