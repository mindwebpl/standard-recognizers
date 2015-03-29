<?php
namespace Mindweb\Tracker\Recognizer;

use Mindweb\Config\Configuration;
use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;
use Pimple;

class UUIDRecognizer extends Recognizer
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @param Pimple $app
     */
    public function __construct(Pimple $app)
    {
        $this->configuration = $app['configuration'];
    }

    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'uuid',
            uniqid(
                $this->configuration->get('tracker.uuid.prefix'),
                $this->configuration->get('tracker.uuid.moreEntropy')
            )
        );
    }
}