<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PermissaoGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use Auth;

class usuarioController extends Controller
{
    public function index(Request $r)
    {
        $usuarios = User::query();
        $filters = $r->only(['nome', 'email']);

        $item = Validator::make(
            $filters,
            [
                'nome' => ['string', 'max:255', 'nullable'],
                'email' => ['string', 'max:255', 'nullable'],
            ],
            messages()
        )->validate();

        if (!empty($item['nome'])) {
            $usuarios->where('nome', 'like', "%{$item['nome']}%");
        }
        if (!empty($item['email'])) {
            $usuarios->where('email', 'like', "%{$item['email']}%");
        }
        // dd($filters);
        $usuarios = $usuarios->paginate(10)->appends($filters);
        return view('pages.usuario.index', compact('usuarios', 'filters'));
    }
    public function create(Request $r)
    {
        $usuario = null;
        return view('pages.usuario.createedit', compact('usuario'));
    }
    public function edit(Request $r, $id)
    {
        $usuario = User::find($id);
        if(!$usuario) {
            return back()->withErrors(['Usuário não encontrado!']);
        }
        return view('pages.usuario.createedit', compact('usuario'));
    }
    public function viewer(Request $r, $id)
    {
        $usuario = User::find($id);
        if(!$usuario) {
            return back()->withErrors(['Usuário não encontrado!']);
        }
        return view('pages.usuario.viewer', compact('usuario'));
    }
    public function delete(Request $r, $id)
    {
        $user = User::find($id);
        if(!$user) {
            return back()->withErrors(['Usuário não encontrado!']);
        }
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Atualizado com sucesso!');
    }


    public function save(Request $request, $id = null)
    {
        $user = User::find($id) ?? new User();

        $item = Validator::make(
            $request->all(),
            $this->rules($request->mode, $request->mode == 'update'),
            messages()
        )
        ->validate();


        $where = array(array('email', '=', $item['email'] ));
        if ($item['mode'] == 'edit') {
            array_push($where, ['id', "!=", $id ]) ;
        }

        if(User::where($where)->exists()) {
            return back()->withInput($request->all())->withErrors(['E-mail já existe']);
        }

        $user->nome = $item['nome'];
        $user->cpf = $item['cpf'];
        $user->datanascimento = $item['datanascimento'];
        $user->celular = $item['celular'];
        $user->email = $item['email'];

        if($request->hasFile('image')) {
            try {
                $filename = $user->id.'_user.'.$request->file('image')->extension();
                $request->file('image')->move('users', $filename);
                $user->image = $filename;
                $user->save();
            } catch (\Throwable $th) {
                return back()->withInput($request->all())->withErrors(['Falha ao tentar carregar a imagem']);
            }
        }
        return redirect()->route('usuarios.index')->with(
            'success',
            ($item['mode'] == 'create' ? 'Adicionado ' : 'Atualizado '). " com sucesso!"
        );
        // return back()->withInput($request->all())->withErrors(['Usuário e/ou senha inválido(s)']);
    }

    private function rules(string $mode = 'update', bool $update = false)
    {
        return [
            'mode' => ['required' , 'string', Rule::in(['create' , 'edit'])],
            'nome' => ['string', 'max:255', 'min:0' ],
            'cpf' => ['string', 'max:20', 'min:0' ],
            'datanascimento' => ['string', 'max:10', 'min:0' ],
            'celular' => ['string', 'max:20', 'min:0' ],
            'email' => ['string', 'max:200', 'min:0' ],
            'grupo' => ['numeric','integer' ],
        ];


    }
}
