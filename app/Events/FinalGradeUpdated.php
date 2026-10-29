<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FinalGradeUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    use Dispatchable, SerializesModels;

    public $employee_id;
    public $period_id;
    public $year;

    // public function __construct($employee_id, $period_id)
    public function __construct($employee_id, $period_id, $year = null)
    {
        $this->employee_id = $employee_id;
        $this->period_id = $period_id;
        $this->year = $year;
    }
}
