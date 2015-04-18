<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class LocalTimeRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $localTimeMap = array('h', 'm', 's');

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        $time = array();
        foreach ($this->localTimeMap as $key) {
            if (!$attributionEvent->getRequest()->query->has($key)) {
                return;
            }

            $time[] = $attributionEvent->getRequest()->query->get($key);
        }

        $attributionEvent->attribute('localTime', implode(':', $time));
    }
}