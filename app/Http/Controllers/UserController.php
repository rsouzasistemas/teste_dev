<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $states = State::all()->pluck('state_name', 'id');
        $cities = City::all()->pluck('city_name', 'id');
        $conditions = [];

        if ($request->method('post')) {

            if (!empty($request->cpf)) {
                array_push($conditions, ['cpf', '=', $request->cpf]);
            }

            if (!empty($request->name)) {
                array_push($conditions, ['name', 'LIKE', '%' . strip_tags(trim($request->name)) . '%']);
            }

            if (!empty($request->birth)) {
                array_push($conditions, ['birth', '=', $request->birth]);
            }

            if (!empty($request->gender)) {
                array_push($conditions, ['gender', '=', $request->gender]);
            }

            if (!empty($request->address)) {
                array_push($conditions, ['address', 'LIKE', '%' . strip_tags(trim($request->address)) . '%']);
            }

            if (!empty($request->state_id)) {
                array_push($conditions, ['state_id', '=', $request->state_id]);
            }

            if (!empty($request->city_id)) {
                array_push($conditions, ['city_id', '=', $request->city_id]);
            }
        }

        // LIMITAR OS CAMPOS ENVIADOS PARA AS VIEWS!!!!!
        $users = User::where($conditions)->with('users_state')->with('users_city')->paginate();

        // dd($users);

        return view('blade_views.users.index', compact('users', 'states', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all()->pluck('state_name', 'id');
        $cities = City::all()->pluck('city_name', 'id');

        return view('blade_views.users.create', compact('states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user = $user->create($data);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, string|int $id)
    {
        $states = State::all()->pluck('state_name', 'id');
        $cities = City::all()->pluck('city_name', 'id');

        if (!$user = $user->find($id)) {
            return back();
        }

        return view(
            'blade_views.users.edit',
            compact('states', 'cities', 'user')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user, string|int $id)
    {
        if (!$user = $user->find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->validated();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string|int $id)
    {
        if (!$user = $user->find($id)->delete()) {
            return redirect()->route('users.index');
        }

        return redirect()->route('users.index');
    }
}
