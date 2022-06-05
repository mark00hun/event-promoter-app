<?php

declare(strict_types=1);

namespace App\Http\Processes;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\EventUserRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EventProcess
{
    private $userRepository;
    private $eventRepository;
    private $eventUserRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        EventRepositoryInterface $eventRepository,
        EventUserRepositoryInterface $eventUserRepository
    ) {
        $this->userRepository = $userRepository;
        $this->eventRepository = $eventRepository;
        $this->eventUserRepository = $eventUserRepository;
    }

    public function getAllEventsForDataTable(): Builder
    {
        return $this->eventRepository->newQuery()->with(['location', 'performer']);
    }

    public function disjoinEventFromUser(Event $event, User $user): void
    {
        $eventUser = $this->eventUserRepository->getByUserAndEvent($user, $event);

        if ($eventUser instanceof EventUser) {
            $eventUser->delete();
        }
    }

    public function joinEventToUser(Event $event, User $user): void
    {
        $this->eventUserRepository->updateOrCreate(
            [
                'fk_id_event' => $event->id_event,
                'fk_id_user' => $user->id_user
            ]
        );
    }

    public function getUserById(int $id): ?User
    {
        return $this->userRepository->find($id);
    }
}
