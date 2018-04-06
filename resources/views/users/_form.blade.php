<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Nombre</label>
        {!!   Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    </div>

    <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="name">Email</label>
        {!!   Form::email('email', null, ['class' => 'form-control']) !!}
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="name">Password</label>
        {!!   Form::password('password', ['class' => 'form-control']) !!}
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    </div>

    <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="name">Password Confirm</label>
        {!!   Form::password('password_confirmation', ['class' => 'form-control']) !!}
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('state') ? ' has-error' : '' }}">
        <label for="name">Estado</label>
        {!!   Form::select('state', ['0' => 'Inactivo', '1' => 'Activo'], null, ['class' => 'form-control']) !!}
        <span class="help-block">
            <strong>{{ $errors->first('state') }}</strong>
        </span>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-block btn-success btn-lg">Enviar</button>
    </div>
</div>