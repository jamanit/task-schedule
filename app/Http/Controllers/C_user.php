<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_user;

class C_user extends Controller
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
            'title'          => 'User',
            'menu_byidlevel' => $this->menu_byidlevel,
            'users'          => M_user::orderBy('id', 'DESC')->get()
        ];

        return view('user.V_user', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'user_name' => 'required|string|max:255',
        // ], [
        //     Session::flash('error', 'Data failed to be saved.')
        // ]);

        // $user                = new M_user();
        // $user->created_by    = Auth::user()->name;
        // $user->user_name = $request->user_name;
        // $user->save();

        return redirect()->route('user_index')->with('success', 'Data added successfully.');
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
        // $request->validate([
        //     'user_name' => 'required|string|max:255',
        // ], [
        //     Session::flash('error', 'Data failed to be updated.')
        // ]);

        // $user = M_user::findOrFail($id);

        // $user->updated_by    = Auth::user()->name;
        // $user->user_name = $request->user_name;
        // $user->save();

        return redirect()->route('user_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $user = M_user::findOrFail($id);
        $user->delete();

        return redirect()->route('user_index')->with('success', 'Data deleted successfully.');
    }
}
