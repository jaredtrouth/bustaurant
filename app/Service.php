<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $dates = [
    'created_at',
    'updated_at',
    'date',
    'starttime',
    'endtime'
  ];

  protected $fillable = [
    'start_datetime',
    'end_datetime',
    'loc_name',
    'loc_lat',
    'loc_long'
  ];

  

}
