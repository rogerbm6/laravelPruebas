<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable =
    [
      'bio', 'company', 'technologies',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
