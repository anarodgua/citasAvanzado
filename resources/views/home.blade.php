@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido {{Auth::user()->name }}</div>

                    <div class="panel-body">
                        Está usted utilizando el gestor de citas Ask For Health.
                               Use el menú para explorar sus opciones.
                                  Gracias por confiar en nosotros.
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
