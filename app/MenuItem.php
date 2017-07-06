<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
  protected $table = 'menuitems';

  protected $casts = ['active' => 'boolean'];

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
