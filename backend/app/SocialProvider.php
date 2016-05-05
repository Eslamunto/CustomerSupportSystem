<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'social_providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider', 'oauth_token', 'oauth_secret_token', 'account_id', 'account_name', 
        'account_screen_name', 'account_avatar', 'consumer_key', 'consumer_secret',
    ];
}
