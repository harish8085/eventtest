<?php

namespace App\Repositories;

use App\Models\Event;
use Exception;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\DB;


class EventRepository extends BaseRepository
{
    protected $eventRecurrenceRepository;

    /**
     * Method __construct
     *
     * @param Application $app [explicite description]
     *
     * @return void
     */
    public function __construct(
        Application $app,
        EventRecurrenceRepository $eventRecurrenceRepository
    ) {
        parent::__construct($app);
        $this->eventRecurrenceRepository = $eventRecurrenceRepository;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }

    /**
     * Method boot
     *
     * @return void
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Method addEvent
     *
     * @param $request 
     *
     * @return void
     */
    public function createEvent($request)
    {
        DB::beginTransaction();
        $event = $this->create(
            [
                'title' => $request['title'],
                'start_date' => date('Y-m-d', strtotime($request['start_date'])),
                'end_date' => date('Y-m-d', strtotime($request['end_date'])),
                'recurrence_id' => $request['recurrence_on'],
            ]
        );
        if (!$event) {
            DB::rollBack();
            throw new Exception('Event not created.');
        }

        $recurrence = $this->eventRecurrenceRepository->create(
            [
                'recurrence_id' => $request['recurrence_on'],
                'event_id' => $event->id,
                'repeat_on' => ($request['recurrence_on'] == 1) ? $request['repeat_on'] : null,
                'skip_day' => ($request['recurrence_on'] == 1) ? $request['skip_day'] : null,
                'repeat_index' => ($request['recurrence_on'] == 2) ? $request['repeat_index'] : null,
                'repeat_day' => ($request['recurrence_on'] == 2) ? $request['repeat_day'] : null,
                'repeat_criteria' => ($request['recurrence_on'] == 2) ? $request['repeat_criteria'] : null,
            ]
        );

        if (!$recurrence) {
            DB::rollBack();
            throw new Exception('Event not created.');
        }
        DB::commit();
        return true;
    }

    /**
     * Method getEvents
     *
     * @return void
     */
    public function getEvents()
    {
        return $this->with('evntsRecurrence')->all();
    }

    /**
     * Method deleteEvent
     *
     * @param $request $request 
     *
     * @return void
     */
    public function deleteEvent($request)
    {
        $event = $this->where(['id' => $request['id']])->first();
        $event->delete();
        $recuurence = $this->eventRecurrenceRepository->where(['event_id' => $request['id']]);
        $recuurence->delete();
        return true;
    }
    
    /**
     * Method getEvent
     *
     * @param $id $id 
     *
     * @return void
     */
    public function getEvent($id) 
    {
        return $this->where(['id' => $id])->first();
    }
}
