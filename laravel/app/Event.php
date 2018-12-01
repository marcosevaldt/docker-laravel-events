<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventStatus;

class Event extends Model
{
  protected $dates    = ['date'];
  protected $fillable = ['name', 'address', 'description', 'value', 'status_id', 'date'];

	/**
	 * Get the status that owns the event.
	 */
  public function status()
  {
  	return $this->belongsTo('App\EventStatus');
  }

  /**
   * Scope a query to only include active events.
   *
   * @param \Illuminate\Database\Eloquent\Builder $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
	public function scopeActive($query)
	{
	  return $query->where('status_id', EventStatus::where('name', '=', 'Ativo')->first()->id);
	}

	/**
   * Scope a query to only include inactive events.
   *
   * @param \Illuminate\Database\Eloquent\Builder $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
	public function scopeInactive($query)
	{
	  return $query->where('status_id', EventStatus::where('name', '=', 'Inativo')->first()->id);
	}

}
