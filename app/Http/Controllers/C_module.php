<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_module;

class C_module extends Controller
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

    public function index()
    {
        $data = [
            'title'          => 'Module',
            'menu_byidlevel' => $this->menu_byidlevel,
            'modules'     => M_module::orderBy('id_module', 'DESC')->get()
        ];

        return view('module.V_module', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be saved.')
        ]);

        $module                = new M_module();
        $module->created_by    = Auth::user()->name;
        $module->module_name = $request->module_name;
        $module->save();

        return redirect()->route('module_index')->with('success', 'Data added successfully.');
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
            'module_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be updated.')
        ]);

        $module = M_module::findOrFail($id);

        $module->updated_by    = Auth::user()->name;
        $module->module_name = $request->module_name;
        $module->save();

        return redirect()->route('module_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $module = M_module::findOrFail($id);
        $module->delete();

        return redirect()->route('module_index')->with('success', 'Data deleted successfully.');
    }
}
