<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table='apply';
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
        'id','inq_id','hd_doc', 'ielts_doc', 'cl_doc','rl_doc','cv_doc','created_at','updated_at'
    ];
}
