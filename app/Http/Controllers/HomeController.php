<?php

namespace App\Http\Controllers;

use App\Http\Processes\EventProcess;
use App\Models\Event;
use Illuminate\Http\Request;
use DataTables;

class HomeController extends Controller
{
    /**
     * Show the application dashboard
     */
    public function index(Request $request, EventProcess $process)
    {
        if ($request->ajax()) {
            $data = $process->getAllEventsForDataTable();

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
                ->toJson();
        }

        return view('home');
    }
}
