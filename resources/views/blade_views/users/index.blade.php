@extends('blade_views.master.master')

@section('contents')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="row">
            <div class="col">Pesquisar usuários</div>
            <hr class="my-3">
        </div>

        <form action="{{ route('users.index') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-sm-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                </div>

                <div class="col-sm-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="col-sm-3">
                    <label for="birth" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="birth" name="birth">
                </div>

                <div class="col-md-2">
                    <label for="gender" class="form-label">Sexo</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="">Selecione...</option>
                        <option value="H">Homem</option>
                        <option value="M">Mulher</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="col-sm-4">
                    <label for="state" class="form-label">Estado</label>
                    <select class="form-select" id="state" name="state_id">
                        <option value="">Selecione...</option>
                        @foreach ($states as $keyStates => $state)
                            <option value="{{ $keyStates }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="city" class="form-label">Cidade</label>
                    <select class="form-select" id="city" name="city_id">
                        <option value="">Selecione...</option>
                        @foreach ($cities as $keyCities => $city)
                            <option value="{{ $keyCities }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-5">
                    <button class="btn btn-primary btn-lg" type="submit">Pesquisar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg" type="submit">Limpar</a>
                </div>
            </div>
        </form>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="row">
            <div class="col">Lista de usuários</div>
            <div class="col"><a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-xl-end">Novo</a></div>
            <hr class="my-3">
        </div>

        @if (count($users) == 0)
            <div class="row">
                <div class="alert alert-warning">Nenhum registro para ser exibido.</div>
            </div>
        @else
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-center">Ações</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $keyUsers => $user)
                            <tr>
                                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">Editar</a></td>
                                <td>
                                    <form action="{{ route('users.delete', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button href="{{ route('users.delete', $user->id) }}" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->cpf }}</td>
                                <td>{{ $user->birth }}</td>
                                <td>{{ $user->users_state->state_name }}</td>
                                <td>{{ $user->users_city->city_name }}</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col">{{ $users->links() }}</div>

                <div class="col">
                    <div class="float-xl-end">Mostrando {{$users->count()}} de um total de {{$users->total()}} registro(s)</div>
                </div>
            </div>
        @endif
    </div>
@endsection