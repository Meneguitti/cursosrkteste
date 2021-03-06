@extends('adminlte::page')

@section('title', "Permissões Vinculados a permissão {$permission->name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('permissions.index') }}" > Permissões </a> </li>
</ol>

<h1>Perfis da Permisão {{ $permission->name }} </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $profiles->appends($filters)->links() !!}
                @else 
                {!!  $profiles->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop