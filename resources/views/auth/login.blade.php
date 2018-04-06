@extends('layouts.backend2')

@section('content')
<div class="container">
    <div class="row">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4 ">
                <div class="panel panel-default" style="-webkit-box-shadow: 1px 3px 15px 5px rgba(0,0,0,0.75);
                        -moz-box-shadow: 1px 3px 15px 5px rgba(0,0,0,0.75);
                        box-shadow: 1px 3px 15px 5px rgba(0,0,0,0.75);">
                    <div class="panel-heading">
                        <div class="row-fluid user-row">
                            <img src="/images/header.png" alt="Grupo GDC" class="img-responsive">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name="email"  type="email" class="form-control" maxlength="120" placeholder="Usuario" required>
                            </div>
                            <div class="input-group">
                                <input maxlength="120" name="password" class="form-control pwd" id="xtpas" placeholder="Contraseña" type="password" required>
                                <span class="input-group-btn" style="position:relative;top: -5px;left:5px;">
                                <button class="btn btn-primary reveal" type="button">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </button>
                            </span>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
