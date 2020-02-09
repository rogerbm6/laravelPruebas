<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'titulo', 'contenido', 'user_id',
  ];

  public function user()
  {
    //primaria y foranea opcionales
    return $this->belongsTo('App\User');
  }
}
