<?php
namespace Mindweb\StandardRecognizers;

use Mindweb\Config\Exception\InvalidConfigEntryException;
use Mindweb\Recognizer\Event;
use Mindweb\Recognizer\Recognizer;
use Pimple;

class UserIdRecognizer extends Recognizer
{
    /**
     * @var array
     */
    private $defaultUserIds = array('_id', 'id', 'user_id');

    /**
     * @var array
     */
    private $userIds;

    /**
     * @param Pimple $application
     */
    public function __construct(Pimple $application)
    {
        if (isset($application['configuration'])) {
            try {
                $this->userIds = $application['configuration']->get('tracker.userIds');
            } catch (InvalidConfigEntryException $configException) {
                $this->userIds = $this->defaultUserIds;
            }
        } else {
            $this->userIds = $this->defaultUserIds;
        }
    }

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