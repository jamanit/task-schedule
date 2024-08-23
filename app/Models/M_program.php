<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_program extends Model
{
    use HasFactory;

    protected $table = 'tb_programs';

    protected $primaryKey = 'id_program';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'program_name',
    ];

    public $timestamps = true;

    public function taskschedules()
    {
        return $this->hasMany(M_taskschedule::class, 'id_program', 'id_program');
    }
}
