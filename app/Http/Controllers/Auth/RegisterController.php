<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json(['message' => 'Usuário registrado com sucesso'], 201);
    }

    public function register(Request $request)
    {
       return view('auth.register', ['data' => $request->all()]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users'),
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:20',
                'confirmed',
            ],
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos :min caracteres.',
            'name.max' => 'O nome não pode ter mais de :max caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de :max caracteres.',
            'email.unique' => 'E-mail já existente',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.max' => 'A senha não pode ter mais de :max caracteres.',
            'password.confirmed' => 'As senhas não coincidem. Por favor, tente novamente.',
        ]);
    }
}