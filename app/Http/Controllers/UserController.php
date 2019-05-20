<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct(User $user )
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->select('users.id','users.name','users.email','contacts.cidade','contacts.uf')
                                    ->leftjoin('contacts','users.contact_id','contacts.id')
                                    ->get();
        return view('users.index',compact('users'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('users.create-edit');
    }
        


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # RECUPERA TODOS OS DADOS QUE VEM DO FORMULÁRIO
        $dataForm = $this->user->addUser($request->all());


        \Session::flash('mensagem_sucesso','Usuário adicionado com sucesso!');    

        # VERIFICA SE REALMENTE CADASTROU
        if ($dataForm)
            return redirect()
                    ->route('user.index');
        else
            return redirect()
                    ->back('user.create')
                    ->with('error', 'Falha ao registrar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->select('users.id','users.name','users.email','contacts.cidade','contacts.uf','rua')
                                    ->where('users.id',$id)
                                    ->leftjoin('contacts','users.contact_id','contacts.id')   
                                    ->get()                               
                                    ->first();
                                  

        return view('users.create-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $this->user->updateUser($request,$id);

        \Session::flash('mensagem_sucesso','Usuário atualizado com sucesso!');    
        
        # VERIFICA SE REALMENTE EDITOU
        if ($update)
        return   Redirect::to('user');
        else
            return redirect()
                    ->back('users.create')
                    ->with('error', 'Falha ao Atualizar!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);

        $user->delete();

        \Session::flash('mensagem_sucesso','Usuário deletado com sucesso!');    

         # VERIFICA SE REALMENTE DELETOU       
        if($user->delete())
            return redirect()
                    ->route('users.index');
        else
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao deletar!');
    }
}
