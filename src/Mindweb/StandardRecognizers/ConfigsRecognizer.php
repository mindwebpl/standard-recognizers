<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Config\Exception\InvalidConfigEntryException;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Pimple;

class ConfigsRecognizer extends Recognizer
{
    private $configsMap = array(
        'fla', 'java', 'dir', 'qt', 'realp', 'pdf', 'wma', 'gears', 'ag', 'cookie'
    );

    /**
     * @param Pimple $application
     */
    public function __construct(Pimple $application)
    {
        if (isset($application['configuration'])) {
            try {
                $this->configsMap = $application['configuration']->get('tracker.configsMap');
            } catch (InvalidConfigEntryException $configException) {}
        }
    }

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        foreach ($this->configsMap as $config) {
            $attributionEvent->attribute(
                'config.' . $config,
                $attributionEvent->getRequest()->get($config) === '1'
            );
        }
    }
}