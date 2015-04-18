<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class ConfigsRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $configsMap = array(
        'fla', 'java', 'dir', 'qt', 'realp', 'pdf', 'wma', 'gears', 'ag', 'cookie'
    );

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