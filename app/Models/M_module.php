<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_module extends Model
{
    use HasFactory;

    protected $table = 'tb_modules';

    protected $primaryKey = 'id_module';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'module_name',
    ];

    public $timestamps = true;

    public function taskschedules()
    {
        return $this->hasMany(M_taskschedule::class, 'id_module', 'id_module');
    }
}
