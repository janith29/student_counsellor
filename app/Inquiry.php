<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    
    protected $table='inquiry';
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
        'id','std_name', 'email', 'address','age','phone_num','course','university','start_date','submit_document','submit_offer','created_at','updated_at'
    ];
}
