<?php

declare(strict_types=1);

namespace App\Http\Processes;

use App\Repositories\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EventProcess
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEventsForDataTable(): Builder
    {
        return $this->eventRepository->newQuery()->with(['location', 'performer']);
    }
}
