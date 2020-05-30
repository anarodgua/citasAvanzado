@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios de AskForHealth</div>


                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'users.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear usuario', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Tipo de usuario</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($users as $user)


                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->userType}}</td>



                                    <td>
                                        {!! Form::open(['route' => ['users.edit',$user->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
