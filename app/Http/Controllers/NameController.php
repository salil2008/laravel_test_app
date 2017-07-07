<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NameController extends Controller
{
  protected $response;

  public function __construct(Response $response)
  {
      $this->response = $response;
  }

  public function index (){
  
    $user = User::find();

    Log::info($user)
    }
}
