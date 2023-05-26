<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return UserResource::collection(User::all());
    }

    public function listWithTrashed()
    {
        return UserResource::collection(User::onlyTrashed());
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
    }

    public function export()
    {

    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function restore(User $user)
    {
        $user->restore();
    }

    public function forceDelete(User $user)
    {
        $user->forceDelete();
    }


}
