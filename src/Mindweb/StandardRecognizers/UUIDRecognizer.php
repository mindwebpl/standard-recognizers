<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event\AttributionEvent;
use Mindweb\Recognizer\Recognizer;

class UUIDRecognizer extends Recognizer
{
    /**
     * @var string
     */
    private $prefix = '';

    /**
     * @var bool
     */
    private $moreEntropy = false;

    /**
     * @param AttributionEvent $attributionEvent
     */
    public function recognize(AttributionEvent $attributionEvent)
    {
        $attributionEvent->attribute(
            'uuid',
            uniqid($this->prefix, $this->moreEntropy)
        );
    }
}