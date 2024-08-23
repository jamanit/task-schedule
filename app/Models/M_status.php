<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_status extends Model
{
    use HasFactory;

    protected $table = 'tb_statuses';

    protected $primaryKey = 'id_status';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'status_name',
    ];

    public $timestamps = true;

    public function taskschedules()
    {
        return $this->hasMany(M_taskschedule::class, 'id_status', 'id_status');
    }
}
