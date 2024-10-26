<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(Request $req, string $id = null)
    {
        if ($id !== null) {
            $queryResult = DB::table('users')->find($id);
            echo json_encode([
                'id' => $id,
                'login' => $queryResult->name,
                'password' => $queryResult->password,
            ]);
            return;
        } elseif ($req->query('login') !== null) {
            $queryResult = DB::table('users')->where('name', $req->query('login'))->get();
            echo json_encode([
                'id' => $queryResult->id,
                'login' => $req->query('login'),
                'password' => $queryResult->password,
            ]);
            return;
        }
        echo json_encode([
            'error' => 'no id nor login provided'
        ]);
    }

    public function authenticate(Request $req)
    {
        if ($req->json('login') === null) {
            echo json_encode([
                'error' => 'no login provided'
            ]);
            return;
        } elseif ($req->json('password') === null) {
            echo json_encode([
                'error' => 'no password provided'
            ]);
            return;
        }
        $queryResult = DB::table('users')->where('name', $req->json('login'))->where('password', $req->json('password'))->get();
        if (!empty($queryResult[0])) {
            echo json_encode([
                'id' => $queryResult[0]->id,
            ]);
            return;
        } else {
            echo json_encode([
                'error' => 'no such user'
            ]);
        }
    }

    public function delete(Request $req, string $id = null)
    {
        if ($id === null) {
            echo json_encode([
                'error' => 'no id provided'
            ]);
            return;
        }
        echo json_encode(['id' => $id,
            'login' => base64_encode(random_int(10000, 99999)),
            'password' => base64_encode(random_int(10000, 99999)),
        ]);
    }

    public function update(Request $req, string $id = null)
    {
        if ($id === null) {
            echo json_encode([
                'error' => 'no id provided'
            ]);
            return;
        }

        $user_data = [];

        if ($req->json('login') !== null) {
            $user_data['login'] = $req->json('login');
        }

        if ($req->json('password') !== null) {
            $user_data['password'] = $req->json('password');
        }

        echo json_encode($user_data);
    }

    public function register(Request $req)
    {
        if ($req->json('login') === null) {
            echo json_encode([
                'error' => 'no login provided'
            ]);
            return;
        }

        if ($req->json('password') === null) {
            echo json_encode([
                'error' => 'no password provided'
            ]);
            return;
        }

        if (strlen($req->json('password')) < 12) {
            echo json_encode([
                'error' => 'password must contain at least 12 characters'
            ]);
            return;
        }

        echo json_encode([
            'id' => random_int(1000, 9999),
            'login' => $req->json('login'),
            'password' => $req->json('password'),
        ]);
    }

    public function idempotent(string $id)
    {
        echo json_encode('Просто умное слово №' . $id ?: '101');
    }
}
