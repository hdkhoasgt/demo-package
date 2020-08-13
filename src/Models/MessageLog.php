<?php

namespace Hdkhoasgt\DemoPackage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MessageLog
 * @package Hdkhoasgt\DemoPackage\Models
 */
class MessageLog extends Model
{
    use SoftDeletes;

    protected $table = 'message_logs';
    protected $primaryKey = 'id';

    public $fillable = [
        'message',
    ];

    // Disable Laravel's mass assignment protection
    protected $guarded = [];
}
