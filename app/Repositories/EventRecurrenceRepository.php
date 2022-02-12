<?php

namespace App\Repositories;


use App\Models\EventRecurrence;
use Exception;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class EventRecurrenceRepository extends BaseRepository
{

    /**
     * Method __construct
     *
     * @param Application $app [explicite description]
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventRecurrence::class;
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
}
