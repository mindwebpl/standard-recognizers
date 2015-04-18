<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class EngagementRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $engagementKeysMap = array(
        'countOfVisits' => '_idvc',
        'timestampOfPreviousVisits' => '_viewts',
        'timestampOfFirstVisit' => '_idts'
    );

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        foreach ($this->engagementKeysMap as $name => $key) {
            if ($attributionEvent->getRequest()->query->has($key)) {
                $attributionEvent->attribute(
                    $name,
                    $attributionEvent->getRequest()->get($key)
                );
            }
        }
    }
}