<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\User;
use App\Transformer\UserTransformer;
use Log;

class UserController extends Controller
{
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index() {
      Log::info('Method invoked getUser');

      $user = User::paginate(15);

      if(!$user) {
        return $this->response->errorNotFound('No users found');
      } else {
        return $this->response->withPaginator($user, new UserTransformer());
      }

    }
}
