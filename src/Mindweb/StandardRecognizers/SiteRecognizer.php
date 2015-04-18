<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class SiteRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $sitePossibleNames = array('site', 'idsite');

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        foreach ($this->sitePossibleNames as $name) {
            if ($attributionEvent->getRequest()->query->has($name)) {
                $site = $attributionEvent->getRequest()->query->get($name);
            }
        }

        if (!empty($site)) {
            $attributionEvent->attribute('site', $site);
        }
    }
}