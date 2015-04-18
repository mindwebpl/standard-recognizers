<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class CampaignRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $campaignMap = array(
        'source' => 'utm_source',
        'medium' => 'utm_medium',
        'term' => 'utm_term',
        'content' => 'utm_content',
        'name' => 'utm_campaign',
    );

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        foreach ($this->campaignMap as $name => $key) {
            if ($attributionEvent->getRequest()->query->has($key)) {
                $attributionEvent->attribute(
                    'campaign.' . $name,
                    $attributionEvent->getRequest()->query->get($key)
                );
            }
        }
    }
}