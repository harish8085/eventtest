<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller as BaseController;

class EventController extends BaseController
{
    public $eventRepository;

    /**
     * Method __construct
     *
     * @param EventRepository $eventRepository 
     *
     * @return void
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        return view('event.index');
    }
    /**
     * Method index
     *
     * @return void
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Method store
     *
     * @param CreateEventRequest $request 
     *
     * @return void
     */
    public function store(CreateEventRequest $request)
    {
        try {
            $this->eventRepository->createEvent($request->all());
            return redirect('/');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Method getEvents
     *
     * @return void
     */
    public function getEvents()
    {
        $events = $this->eventRepository->getEvents();
        $view = View::make(
            'event._list',
            [
                'data' => $events,
            ]
        )->render();
        return response()->json(['success' => true, 'data' => $view]);
    }

    /**
     * Method deleteEvent
     *
     * @return void
     */
    public function deleteEvent(Request $request)
    {
        try {
            $this->eventRepository->deleteEvent($request->all());
            return response()->json(['success' => true, 'data' => [], 'message' => 'Event deleted successfully']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function editEvent($id)
    {
        try {
            $event = $this->eventRepository->getEvent($id);
            return view('event.edit', ['data' => $event]);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
