<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Dingo\Api\Routing\Helpers;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    use Helpers;
    public function getUsers($count){

        $users = User::paginate($count);
        return $this->response->paginator($users, new UserTransformer);
    }
}
