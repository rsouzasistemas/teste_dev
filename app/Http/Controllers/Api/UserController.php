<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
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

        $users = User::where($conditions)->with('users_state')->with('users_city')->paginate();
        return UserResource::collection($users);
    }

    public function store(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user = $user->create($data);

        return UserResource::collection($user);
    }

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

        return UserResource::collection($user);
    }

    public function destroy(User $user, string|int $id)
    {
        if (!$user = $user->find($id)) {
            return response()->json(['error' => 'Your request could not be completed.'], 404);
        }

        $user->delete();

        return response()->json([], 204);
    }
}