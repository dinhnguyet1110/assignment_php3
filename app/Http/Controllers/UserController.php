<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.user.';

    public function index()
    {
        $data = User::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'type' => ['required', Rule::in([User::TYPE_ADMIN, User::TYPE_MEMBER])],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);

        return redirect()->route('admin.user.index');
    }


    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => 'nullable|string|min:8',
            'type' => ['required', Rule::in(['admin', 'member'])],
        ]);
    
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'type' => $request->type,
        ]);
    
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy(string $id)
    {
        $model = User::query()->findOrFail($id);
        $model->delete();
      
        return back();
    }
}
