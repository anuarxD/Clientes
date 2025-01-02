<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::where('role', '!=', 'Super Admin')->paginate(10);

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  // Validación de la contraseña
            'role' => 'required|in:Psicologo,Paciente',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  // Encriptación de la contraseña
        $user->role = $request->role;
        $user->save();

        if ($user->role === 'Paciente') {
            Patient::create([
                'usuario_id' => $user->id,
            ]);
        }
    
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        // Si no se encuentra el usuario, devuelve un error
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    
        // Devuelve los datos del usuario en formato JSON
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required|string|in:Psicologo,Paciente',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role'); // Asegúrate de que la columna "role" exista en tu tabla de usuarios.
    
    // Si deseas actualizar la contraseña (opcional)
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
}


public function destroy($id): RedirectResponse
{
    // Encontrar el usuario por su ID
    $user = User::find($id);

    // Si el usuario existe, eliminarlo
    if ($user) {
        // Eliminar el usuario y su paciente asociado automáticamente gracias a onDelete('cascade')
        $user->delete();

        return Redirect::route('users.index')
            ->with('success', 'Usuario y sus datos asociados eliminados correctamente');
    }

    return Redirect::route('users.index')
        ->with('error', 'Usuario no encontrado');
}

public function toggleStatus($id)
{
    $user = User::findOrFail($id);

    // Cambiar estado: si es 'activo', cambiar a 'inactivo', y viceversa
    $user->status = $user->status === 'activo' ? 'inactivo' : 'activo';
    $user->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('users.index')->with('success', 'El estado del usuario ha sido actualizado.');
}

}
