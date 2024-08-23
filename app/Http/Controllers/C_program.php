<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_program;

class C_program extends Controller
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
            'title'          => 'Program',
            'menu_byidlevel' => $this->menu_byidlevel,
            'programs'     => M_program::orderBy('id_program', 'DESC')->get()
        ];

        return view('program.V_program', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be saved.')
        ]);

        $program                = new M_program();
        $program->created_by    = Auth::user()->name;
        $program->program_name = $request->program_name;
        $program->save();

        return redirect()->route('program_index')->with('success', 'Data added successfully.');
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
            'program_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be updated.')
        ]);

        $program = M_program::findOrFail($id);

        $program->updated_by    = Auth::user()->name;
        $program->program_name = $request->program_name;
        $program->save();

        return redirect()->route('program_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $program = M_program::findOrFail($id);
        $program->delete();

        return redirect()->route('program_index')->with('success', 'Data deleted successfully.');
    }
}
