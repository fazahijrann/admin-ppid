<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KelolaPejabatController extends Controller
{
    /**
     * Display a listing of the resource.  
     * {{ route('pejabatppid.index') }}
     */
    public function index()
    {
        $data = User::where('role', 'pejabat_ppid')->get();
        // dd($data);
        return view('crud-akun.tampil-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * {{ route('pejabatppid.create') }}
     */
    public function create()
    {
        return view('crud-akun.create');
    }

    /**
     * Store a newly created resource in storage.
     * {{ route('pejabatppid.store') }}
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pejabat_ppid',
        ]);

        return redirect(route('pejabatppid.index'));
    }

    /**
     * Display the specified resource.
     * {{ route('pejabatppid.show') }}
     */
    public function show(User $user)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     * {{ route('pejabatppid.edit') }}
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('crud-akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * {{ route('pejabatppid.update') }}
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
        ]);

        $user = User::findOrFail($id);

        // Ambil field name dan email yang diisi
        $data = $request->only(['name', 'email']);

        // Perbarui password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect(route('pejabatppid.index'));
    }

    /**
     * Remove the specified resource from storage.
     * {{ route('pejabatppid.destroy') }}
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('pejabatppid.index', compact('user')));
    }
}
