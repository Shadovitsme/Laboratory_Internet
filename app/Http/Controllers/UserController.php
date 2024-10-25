<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $req, $id = null)
    {
        if ($id === null && $req->query('login') === null) {
            return json_encode([
                array_map(function ($x) {
                    return [
                        'id' => random_int(1000, 1000 * $x),
                        'login' => random_bytes(4 + $x),
                        'password' => random_bytes(16),
                    ];
                }, range(0, 10))
            ]);
        } elseif ($req->query('login') !== null) {
            return json_encode([
                'id' => random_int(1000, 9999),
                'login' => $req->query('login'),
                'password' => random_bytes(16),
            ]);
        } elseif ($id !== null) {
            return json_encode([
                'id' => $id,
                'login' => random_bytes(10),
                'password' => random_bytes(16),
            ]);
        }

        return json_encode([
            'error' => 'no id nor login provided'
        ]);
    }

    public function authenticate(Request $req)
    {
        if ($req->json('login') === null) {
            return json_encode([
                'error' => 'no login provided'
            ]);
        } elseif ($req->json('password') === null) {
            return json_encode([
                'error' => 'no password provided'
            ]);
        }

        return json_encode([
            'id' => random_int(1000, 9999),
        ]);
    }

    public function delete(Request $req, $id = null)
    {
        if ($id === null) {
            return json_encode([
                'error' => 'no id provided'
            ]);
        }

        return json_encode([
            'id' => random_int(1000, 9999),
            'login' => random_bytes(10),
            'password' => random_bytes(16),
        ]);
    }

    public function update(Request $req, $id = null)
    {
        if ($id === null) {
            return json_encode([
                'error' => 'no id provided'
            ]);
        }

        $user_data = [];

        if ($req->json('login') !== null) {
            $user_data['login'] = random_bytes(10);
        }

        if ($req->json('password') !== null) {
            $user_data['password'] = random_bytes(16);
        }

        return json_encode($user_data);
    }

    public function register(Request $req)
    {
        if ($req->json('login') === null) {
            return json_encode([
                'error' => 'no login provided'
            ]);
        }

        if ($req->json('password') === null) {
            return json_encode([
                'error' => 'no password provided'
            ]);
        }

        if (strlen($req->json('password')) < 12) {
            return json_encode([
                'error' => 'password must contain at least 12 characters'
            ]);
        }

        return json_encode([
            'id' => random_int(1000, 9999),
            'login' => $req->json('login'),
            'password' => $req->json('password'),
        ]);
    }

    public function idempotent(string $id)
    {
        return json_encode('Просто умное слово №' . $id ?: '101');
    }
}
