<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_user extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'id_level',
    ];

    public $timestamps = true;
}
