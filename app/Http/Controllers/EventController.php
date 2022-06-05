<?php

namespace App\Http\Controllers;

use App\Http\Processes\EventProcess;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    private $eventProcess;

    public function __construct(EventProcess $eventProcess)
    {
        $this->eventProcess = $eventProcess;
    }

    /**
     * Show the application dashboard
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->eventProcess->getAllEventsForDataTable();

            return DataTables::eloquent($data)
                ->editColumn('date', function (Event $event) {
                    return date_format($event->date, 'Y-m-d');
                })
                ->addColumn('location', function (Event $event) {
                    return $event->location->name;
                })
                ->addColumn('performer', function (Event $event) {
                    return $event->performer->name;
                })
                ->addColumn('action', function (Event $event) {
                    $isUserInEvent = $event->users->contains(Auth::id());

                    return !$isUserInEvent
                        ? '<a href ="' . route('event.buy', ['event' => $event]) . '" class="btn btn-success">Buy</a>'
                        : '<a href ="' . route('event.withdraw', ['event' => $event]) . '" class="btn btn-danger">Withdraw</a>';
                })
                ->toJson();
        }

        return view('events');
    }

    public function buy(Event $event)
    {
        $user = $this->eventProcess->getUserById(Auth::id());

        if ($user instanceof User) {
            $this->eventProcess->joinEventToUser($event, $user);
        }

        return redirect()->route('events');
    }

    public function withdraw(Event $event)
    {
        $user = $this->eventProcess->getUserById(Auth::id());

        if ($user instanceof User) {
            $this->eventProcess->disjoinEventFromUser($event, $user);
        }

        return redirect()->route('events');
    }
}
