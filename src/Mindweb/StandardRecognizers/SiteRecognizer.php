<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class SiteRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        $site = null;
        if ($attributionEvent->getRequest()->query->has('site')) {
            $site = $attributionEvent->getRequest()->query->get('site');
        }

        if ($attributionEvent->getRequest()->query->has('idsite')) {
            $site = $attributionEvent->getRequest()->query->get('idsite');
        }

        if ($site !== null) {
            $attributionEvent->attribute('site', $site);
        }
    }
}