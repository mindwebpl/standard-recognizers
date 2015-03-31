<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Config\Exception\InvalidConfigEntryException;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Pimple;

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
     * @param Pimple $application
     */
    public function __construct(Pimple $application)
    {
        if (isset($application['configuration'])) {
            try {
                $this->engagementKeysMap = $application['configuration']->get('tracker.engagementKeysMap');
            } catch (InvalidConfigEntryException $configException) {}
        }
    }

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