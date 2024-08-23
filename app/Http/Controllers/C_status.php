<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_status;

class C_status extends Controller
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
            'title'          => 'Status',
            'menu_byidlevel' => $this->menu_byidlevel,
            'statuses'       => M_status::orderBy('id_status', 'DESC')->get()
        ];

        return view('status.V_status', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be saved.')
        ]);

        $status              = new M_status();
        $status->created_by  = Auth::user()->name;
        $status->status_name = $request->status_name;
        $status->save();

        return redirect()->route('status_index')->with('success', 'Data added successfully.');
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
            'status_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data failed to be updated.')
        ]);

        $status = M_status::findOrFail($id);

        $status->updated_by  = Auth::user()->name;
        $status->status_name = $request->status_name;
        $status->save();

        return redirect()->route('status_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $status = M_status::findOrFail($id);
        $status->delete();

        return redirect()->route('status_index')->with('success', 'Data deleted successfully.');
    }
}
