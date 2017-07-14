<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
  protected $table = 'menuitems';

  protected $casts = ['active' => 'boolean'];

  protected $fillable = ['name', 'slug', 'description', 'active', 'image_path', 'price'];

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
