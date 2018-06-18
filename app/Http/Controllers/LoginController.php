<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use App\Entities\RequestError;

class LoginController extends Controller
{
    /**
     * @var \Illuminate\Validation\Factory $validator
     */
    private $validator;

    /**
     * @var AuthRepository $repo
     */
    private $repo;

    public function __construct()
    {
        $this->repo = new AuthRepository();
        $this->validator = $this->getValidator();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validation = $this->validator->make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

        if ($validation->fails())
        {
            $error = new RequestError(
                $validation->errors()->toArray(),
                400,
                true
            );
            return response()->json($error, $error->statusCode);
        }
        else
        {
            $auth = $this->repo->findByEmail($request->json("email"));
            dd($auth);
            return response()->json([
                "data" => $auth
            ], 200);
        }
    }

    public function logout()
    {

    }

    public function register(Request $request)
    {
        $validation = $this->validator->make($request->all(),
            [
                'first_name' => 'required|max:250',
                'last_name' => 'required|max:250',
                'username' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|max:16'
            ]);

        $password = $request->json("password");
        dd($this->hasher()->make($password));
    }
}