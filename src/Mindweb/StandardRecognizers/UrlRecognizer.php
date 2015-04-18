<?php
namespace Mindweb\StandardRecognizers;

use League\Url\Url;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Mindweb\StandardRecognizers\Exception\UrlIsRequiredException;

class UrlRecognizer extends Recognizer
{
    private $parametersToExcludeFromUrl = array();

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
        if (!empty($this->parametersToExcludeFromUrl)) {
            $url->getQuery()->modify(
                array_fill_keys(
                    $this->parametersToExcludeFromUrl,
                    null
                )
            );
        }

        $attributionEvent->attribute('url', (string) $url);
    }
}