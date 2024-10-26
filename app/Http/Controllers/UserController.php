<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showData($queryResult)
    {
        echo json_encode([
            'id' => $queryResult->id,
            'login' => $queryResult->name,
            'password' => $queryResult->password,
        ]);
        return;
    }
    public function checkZeroArray($queryResult)
    {
        if (!empty($queryResult)) {
            $this->showData($queryResult);
            return;
        } else {
            echo json_encode(
                [
                    'error' => 'no such user',
                ]
            );
        };
    }

    public function get(Request $req, string $id = null)
    {
        if ($id !== null) {
            $queryResult = DB::table('users')->find($id);
            $this->checkZeroArray($queryResult);

        } elseif ($req->query('login') !== null) {
            $queryResult = DB::table('users')->where('name', $req->query('login'))->get();
            $this->checkZeroArray($queryResult[0]);
            return;
        } else {
        echo json_encode([
            'error' => 'no id nor login provided'
            ]);
        }
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
        $queryResult = DB::table('users')->where('name', $req->json('login'))->where('password', hash('sha256', $req->json('password')))->get();
        if (!empty($queryResult[0])) {
            echo json_encode([
                'success'
            ]);
            return;
        } else {
            echo json_encode(['error' => 'wrong login or password'
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
        DB::table('users')->where('id', $id)->delete();
        if (empty((DB::table('users')->where('id', $id)->get())[0])) {
            echo json_encode([
                'успех!'
            ]);
            return;
        } else {
            echo json_encode([
                'not success'
            ]);
            return;
        }

    }

    public function update(Request $req, string $id = null)
    {
        if ($id === null) {
            echo json_encode([
                'error' => 'no id provided'
            ]);
            return;
        }
        if (empty((DB::table('users')->where('id', $id)->get())[0])) {
            echo json_encode(['error' => 'no such user']);
            return;
        }

        if ($req->json('login') !== null) {
            DB::table('users')->where('id', $id)->update(['name' => $req->json('login')]);
        }

        if ($req->json('password') !== null) {
            DB::table('users')->where('id', $id)->update(['password' => hash('sha256', $req->json('password'))]);
        }
        $queryResult = DB::table('users')->where('id', $id)->get();

        $this->showData($queryResult[0]);
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

        if (strlen($req->json('password')) < 5) {
            echo json_encode([
                'error' => 'password must contain at least 12 characters'
            ]);
            return;
        }
        $queryResult = DB::table('users')->where('name', $req->json('login'))->get();
        if (empty($queryResult[0])) {
        DB::table('users')->insert([
            'name' => $req->json('login'),
                'email' => rand(10, 100) . '@mail.ru',
                'password' => hash('sha256', $req->json('password')),
        ]);
            $queryResult = DB::table('users')->where('name', $req->json('login'))->get();
            $this->showData($queryResult[0]);
        } else {
            echo json_encode('login already exists');
            return;
        }
    }

}
