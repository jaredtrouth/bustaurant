<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
  protected $table = 'menuitems';

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
