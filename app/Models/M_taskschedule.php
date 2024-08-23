<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_taskschedule extends Model
{
    use HasFactory;

    protected $table = 'tb_taskschedules';

    protected $primaryKey = 'id_taskschedule';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'id_user',
        'id_program',
        'id_module',
        'description',
        'taskschedule_status',
        'change_model',
        'change_controller',
        'change_view',
        'change_database',
        'change_assets',
        'change_others',
        'desc_model',
        'desc_controller',
        'desc_view',
        'desc_datebase',
        'desc_assets',
        'desc_others',
        'images1',
        'images2',
        'images3',
        'images4',
    ];

    public $timestamps = true;

    public function program()
    {
        return $this->belongsTo(M_program::class, 'id_program', 'id_program');
    }

    public function module()
    {
        return $this->belongsTo(M_module::class, 'id_module', 'id_module');
    }

    public function status()
    {
        return $this->belongsTo(M_status::class, 'id_status', 'id_status');
    }

    public function user()
    {
        return $this->belongsTo(M_user::class, 'id_user', 'id');
    }

    public static function programs()
    {
        $query = DB::select('SELECT id_program, program_name FROM tb_programs ORDER BY program_name ASC');
        return $query;
    }

    public static function modules()
    {
        $query = DB::select('SELECT id_module, module_name FROM tb_modules ORDER BY module_name ASC');
        return $query;
    }

    public static function statuses()
    {
        $query = DB::select('SELECT id_status, status_name FROM tb_statuses ORDER BY id_status ASC');
        return $query;
    }

    public static function users()
    {
        $query = DB::select('SELECT id AS id_user, name FROM users ORDER BY name ASC');
        return $query;
    }
}
