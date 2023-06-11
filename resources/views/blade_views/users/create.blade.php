@extends('blade_views.master.master')

@section('contents')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="row">
            <div class="float-md-start">Cadastrar novo usuário</div>
            <hr class="my-4">
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form class="needs-validation" action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="row g-3">
              <div class="col-sm-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
              </div>

              <div class="col-sm-2">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ old('cpf') }}">
              </div>

              <div class="col-sm-2">
                <label for="birth" class="form-label">Nascimento</label>
                <input type="date" class="form-control" id="birth" name="birth" required value="{{ old('birth') }}">
              </div>

              <div class="col-md-2">
                <label for="gender" class="form-label">Sexo</label>
                <select class="form-select" id="gender" name="gender" required>
                  <option value="">Selecione...</option>
                  <option value="H" {{ (old('gender') == 'H') ? 'selected' : null }}>Homem</option>
                  <option value="M" {{ (old('gender') == 'M') ? 'selected' : null }}>Mulher</option>
                </select>
              </div>

              <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
              </div>

              <div class="col-6">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" required value="{{ old('address') }}">
              </div>

              <div class="col-md-6">
                <label for="country" class="form-label">Estado</label>
                <select class="form-select" id="country" name="state_id" required>
                  <option value="">Selecione...</option>
                  @foreach ($states as $keyStates => $state)
                    <option value="{{ $keyStates }}" {{ (old('state_id') == $keyStates) ? 'selected' : null }}>{{ $state }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6">
                <label for="state" class="form-label">Cidade</label>
                <select class="form-select" id="state" name="city_id" required>
                  <option value="">Selecione...</option>
                  @foreach ($cities as $keyCities => $city)
                    <option value="{{ $keyCities }}" {{ (old('city_id') == $keyCities) ? 'selected' : null }}>{{ $city }}</option>
                  @endforeach
                </select>
              </div>

            </div>

            <hr class="my-4">

            <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
        </form>
    </div>
@endsection