<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;

class UserIdRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $userIds = array('_id', 'id', 'user_id');

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    public function recognize(Event\AttributionEvent $attributionEvent)
    {
        foreach ($this->userIds as $userId) {
            if ($attributionEvent->getRequest()->query->has($userId)) {
                $attributionEvent->attribute(
                    $userId,
                    $attributionEvent->getRequest()->query->get($userId)
                );
            }
        }
    }
}