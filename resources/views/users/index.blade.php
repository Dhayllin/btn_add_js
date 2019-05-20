@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensagem_sucesso'))
    <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
    @endif 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">                    
                    <div class="box">
                        <div class="card-body table-full-width table-responsive">
                            <table  class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-Mail</th>
                                        <th>Cidade</th>
                                        <th>UF</th>
                                        <th> 
                                            Editar<i class="fa fa-edit"></i>
                                        </th>
                                        <th>
                                            Ecluir<i class="fa fa-remove"></i>   
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{!! $user->name !!}</td>
                                            <td>{!! $user->email !!}</td>        
                                            <td>{!! $user->cidade !!}</td>        
                                            <td>{!! $user->uf !!}</td>                                            
                                            <td>  
                                            <a  href="{{route('user.edit', $user->user_id)}}"rel="tooltip"  type="button" class="btn btn-primary" data-original-title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                                Editar
                                            </a>
                                            </td>
                                            <td>
                                            <a href="{{route('user.destroy', $user->id)}}" rel="tooltip" type="button"   class="btn btn-danger" data-original-title="Eliminar">
                                                <i class="fa fa-remove">
                                                </i>   
                                                Excluir                           
                                            </a>  
                                            </td> 
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-Mail</th>
                                        <th>Cidade</th>
                                        <th>UF</th>
                                        <th> 
                                            Editar<i class="fa fa-edit"></i>
                                        </th>
                                        <th>
                                            Ecluir<i class="fa fa-remove"></i>   
                                        </th>
                                    </tr>
                                </tfoot>
                            </table><!-- /.table -->
                            <hr>
                            <div class="col-md-12">
                                <a href="{{route('user.create')}}" class="btn btn-primary pull-right">Adiocionar&nbsp;<i class="fa fa-plus"></i></a>
                            </div>                         
                        </div><!-- /.box -->
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection