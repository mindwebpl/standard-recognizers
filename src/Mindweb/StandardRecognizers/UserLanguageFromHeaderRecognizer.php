<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class UserLanguageFromHeaderRecognizer extends Recognizer
{
    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        $languages = $attributionEvent->getRequest()->getLanguages();
        if (!empty($languages)) {
            foreach ($languages as $language) {
                $attributionEvent->attribute('lang', $language);

                break;
            }
        }
    }
}