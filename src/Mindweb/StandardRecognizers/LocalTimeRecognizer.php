<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Config\Exception\InvalidConfigEntryException;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Pimple;

class LocalTimeRecognizer extends Recognizer
{
    private $localTimeMap = array('h', 'm', 's');

    /**
     * @param Pimple $application
     */
    public function __construct(Pimple $application)
    {
        if (isset($application['configuration'])) {
            try {
                $this->localTimeMap = $application['configuration']->get('tracker.localTimeMap');
            } catch (InvalidConfigEntryException $configException) {}
        }
    }

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