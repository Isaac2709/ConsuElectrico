<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    /**
    * Set a custom name to the table model
    * @var string
    */
    protected $table = 'REGISTRY';

    /**
    * Set a custom variable primary key
    * @var string
    */
    protected $primaryKey = 'Reg_ID';

    /**
    * Set the variables timestamps to false
    * @var string
    */
    public $timestamps = false;

    /**
    * Specifies which attributes should be mass-assignable.
    * @var string
    */
    protected $fillable = [ 'Reg_ID', 'Reg_Date', 'Reg_Wing', 'Reg_Vaue'];
}
