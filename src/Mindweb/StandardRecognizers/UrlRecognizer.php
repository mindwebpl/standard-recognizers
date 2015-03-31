<?php
namespace Mindweb\StandardRecognizers;

use League\Url\Url;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Mindweb\StandardRecognizers\Exception\UrlIsRequiredException;

class UrlRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     * @throws UrlIsRequiredException
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        if (!$attributionEvent->getRequest()->query->has('url')) {
            throw new UrlIsRequiredException();
        }

        $url = Url::createFromUrl($attributionEvent->getRequest()->query->get('url'));
        $attribution = $attributionEvent->getAttribution();
        if (isset($attribution['excludeFromUrlAttribution'])) {
            $url->getQuery()->modify(
                array_fill_keys(
                    $attribution['excludeFromUrlAttribution'],
                    null
                )
            );
        }

        $attributionEvent->attribute('url', (string) $url);
    }

    /**
     * @return int
     */
    public static function getPriority()
    {
        return 50;
    }
}