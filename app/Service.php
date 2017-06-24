<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $dates = [
    'created_at',
    'updates_at',
    'start_datetime',
    'end_datetime'
  ];
}
