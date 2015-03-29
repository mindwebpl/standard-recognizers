<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class ResolutionRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        if ($attributionEvent->getRequest()->query->has('res')) {
            $attributionEvent->attribute(
                'resolution',
                $attributionEvent->getRequest()->query->get('res')
            );
        }
    }
}