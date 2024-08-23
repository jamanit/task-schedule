<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_taskschedule;

class C_taskschedule extends Controller
{
    protected $menu_byidlevel;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->id_level) {
                $this->menu_byidlevel = M_menu::menu_byidlevel(auth()->user()->id_level);
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $id_user    = Auth::user()->id;
        $id_status  = $request->id_status;
        $id_program = $request->id_program;
        $id_module  = $request->id_module;
        $created_at = $request->created_at;

        session()->flash('id_status', $id_status);
        session()->flash('id_program', $id_program);
        session()->flash('id_module', $id_module);
        session()->flash('created_at', $created_at);

        $taskschedules = M_taskschedule::with('program', 'module', 'status', 'user')
            ->when($id_status != '', function ($query) use ($id_status) {
                return $query->where('id_status', $id_status);
            })
            ->when($id_program != '', function ($query) use ($id_program) {
                return $query->where('id_program', $id_program);
            })
            ->when($id_module != '', function ($query) use ($id_module) {
                return $query->where('id_module', $id_module);
            })
            ->when(!empty($created_at) && str_contains($created_at, '-'), function ($query) use ($created_at) {
                list($year, $month) = explode('-', $created_at);
                return $query->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year);
            })
            ->when($id_user != 1, function ($query) use ($id_user) {
                return $query->where('id_user', $id_user);
            })
            ->orderBy('id_taskschedule', 'DESC')
            ->get();

        $data = [
            'title'          => 'Task Schedule',
            'menu_byidlevel' => $this->menu_byidlevel,
            'taskschedules'  => $taskschedules,
            'programs'       => M_taskschedule::programs(),
            'modules'        => M_taskschedule::modules(),
            'statuses'       => M_taskschedule::statuses(),
            'users'          => M_taskschedule::users()
        ];

        return view('taskschedule.V_taskschedule', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'image1'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_program'  => 'required|int',
            'id_module'   => 'required|int',
            'deadline'    => 'required|string|max:255',
            'description' => 'max:1000',
        ], [
            Session::flash('error', 'Data failed to be saved.')
        ]);

        $imagePaths = [];
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image     = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/taskschedule'), $imageName);
                $imagePaths[$imageField] = $imageName;
            }
        }

        $taskschedule              = new M_taskschedule();
        $taskschedule->created_by  = Auth::user()->name;
        $taskschedule->id_user     = $request->id_user ? $request->id_user : Auth::user()->id;
        $taskschedule->id_program  = $request->id_program;
        $taskschedule->id_module   = $request->id_module;
        $taskschedule->deadline    = $request->deadline;
        $taskschedule->description = $request->description;
        $taskschedule->id_status   = 1;
        foreach ($imagePaths as $field => $path) {
            $taskschedule->{$field} = $path;
        }
        $taskschedule->save();

        return redirect()->route('taskschedule_index')->with('success', 'Data added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //   
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image1'            => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2'            => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3'            => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4'            => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_program'        => 'required|int',
            'id_module'         => 'required|int',
            'deadline'          => 'required|string|max:255',
            'description'       => 'max:1000',
            'id_status'         => 'required|int',
            'change_model'      => 'max:255',
            'change_controller' => 'max:255',
            'change_view'       => 'max:255',
            'change_database'   => 'max:255',
            'change_assets'     => 'max:255',
            'change_others'     => 'max:255',
            'desc_model'        => 'max:255',
            'desc_controller'   => 'max:255',
            'desc_view'         => 'max:255',
            'desc_database'     => 'max:255',
            'desc_assets'       => 'max:255',
            'desc_others'       => 'max:255'
        ], [
            Session::flash('error', 'Data failed to be updated.')
        ]);

        $taskschedule = M_taskschedule::findOrFail($id);

        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($taskschedule->{$imageField}) {
                    $imagePath = public_path('assets/images/taskschedule/' . $taskschedule->{$imageField});
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }

        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image     = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/taskschedule'), $imageName);
                $taskschedule->{$imageField} = $imageName;
            }
        }

        $taskschedule->updated_by        = Auth::user()->name;
        $taskschedule->id_user           = $request->id_user ? $request->id_user : Auth::user()->id;
        $taskschedule->id_program        = $request->id_program;
        $taskschedule->id_module         = $request->id_module;
        $taskschedule->deadline          = $request->deadline;
        $taskschedule->description       = $request->description;
        $taskschedule->id_status         = $request->id_status;
        $taskschedule->change_model      = $request->change_model;
        $taskschedule->change_controller = $request->change_controller;
        $taskschedule->change_view       = $request->change_view;
        $taskschedule->change_database   = $request->change_database;
        $taskschedule->change_assets     = $request->change_assets;
        $taskschedule->change_others     = $request->change_others;
        $taskschedule->desc_model        = $request->desc_model;
        $taskschedule->desc_controller   = $request->desc_controller;
        $taskschedule->desc_view         = $request->desc_view;
        $taskschedule->desc_database     = $request->desc_database;
        $taskschedule->desc_assets       = $request->desc_assets;
        $taskschedule->desc_others       = $request->desc_others;
        $taskschedule->save();

        return redirect()->route('taskschedule_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $taskschedule = M_taskschedule::findOrFail($id);

        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($taskschedule->{$imageField}) {
                $imagePath = public_path('assets/images/taskschedule/' . $taskschedule->{$imageField});
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $taskschedule->delete();

        return redirect()->route('taskschedule_index')->with('success', 'Data deleted successfully.');
    }
}
