<?php
/**
 * Created by PhpStorm.
 * User: eslam
 * Date: 05.05.16
 * Time: 10:56
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'color'
    ];
}