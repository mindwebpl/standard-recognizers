<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class ReferrerFromUrlRecognizer extends Recognizer
{
    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'referrerUrl',
            $attributionEvent->getRequest()->get('referrer')
        );
    }
}