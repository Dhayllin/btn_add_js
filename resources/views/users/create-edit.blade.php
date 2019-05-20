@extends('layouts.app')

@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if( isset($user) )
                        <div class="card-header">Editar</div>
                        <form class="form form-group" method="post" action="{{ route('user.update', $user->id) }}">
                            <input type="hidden" name="_method" value="patch">
                            {!! csrf_field() !!}
                    @else
                        <div class="card-header">Cadastrar</div> 
                        <form class="form form-group" method="POST" action="{{ route('user.store') }}">  
                        {!! csrf_field() !!}                  
                    @endif
                       
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
    
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-expanded="true">
                                <span class="hidden-xs-down">Geral</span>
                            </a> 
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2">
                                <span class="hidden-xs-down">Contato</span>
                            </a>
                        </li>
        
                    </ul> <!-- nav nav-tabs -->
                        <br>
                        <div class="tab-content tabcontent-border p-20" id="myTabContent">
                                <div role="tabpanel" class="tab-pane fade show active" id="home1" aria-labelledby="home-tab">
                            <h4 class="card-title m-b-40">
                                <strong>Dados do Usuário</strong>
                            </h4> 
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ??  old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confime a senha</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Salvar
                                    </button>
                                </div>
                            </div>
                        </div> <!-- tabpanel  home 1-->
                        
                        <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="home2">
                                <h4 class="card-title m-b-40">
                                    <strong>Contato</strong>
                                    <button class="btn btn-success float-right" type="button" id="plus" >
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </h4>
                                <br />
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade" value="{{ $user->cidade ?? old('cidade') }}">
                                    </div>        
                                    <div class="form-group col-md-5">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control @error('rua') is-invalid @enderror" id="rua" name="rua" value="{{ $user->rua ?? old('rua') }}">
                                    </div>        
                                    <div class="form-group col-md-3">
                                        <label for="uf">UF</label>
                                        <input type="text" class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf" value="{{ $user->uf ?? old('uf') }}">
                                    </div>                                   
                                </div> <!-- row -->
                                <div id="novo-registro"></div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Salvar
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- tab-pane fade -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection