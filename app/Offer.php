<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    
    protected $table='offer';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id','inq_id','app_id','offer_doc','created_at','updated_at'
    ];
}
