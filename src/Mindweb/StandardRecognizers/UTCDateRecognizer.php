<?php
namespace Mindweb\Tracker\Recognizer;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class UTCDateRecognizer extends Recognizer
{
    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'UTCTimestamp',
            gmdate('Y-m-d H:i:s')
        );
    }
}