<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DataTime;

class Event extends Model
{
    //
    protected $fillalbe = ['event_title','room_no','start_time','end_time','description','participant_no','request','remark'];
    public $timestamps = false;




}
