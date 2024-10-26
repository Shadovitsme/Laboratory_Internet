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
            //TODO сделать проверку на нулевой массив
            echo json_encode([
                'id' => $id,
                'login' => $queryResult->name,
                'password' => $queryResult->password,
            ]);
            return;
        } elseif ($req->query('login') !== null) {
            $queryResult = DB::table('users')->where('name', $req->query('login'))->get();
            //TODO сделать проверку на нулевой массив
            echo json_encode(['id' => $queryResult[0]->id,
                'login' => $req->query('login'),
                'password' => $queryResult[0]->password,
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
        //TODO сделать проверку на успешность удаления
        echo json_encode([
            'id' => 'успех!'
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
        $queryResult = DB::table('users')->where('id', $id);
        //TODO сделать проверку на нулевой массив

        if ($req->json('login') !== null) {
            $queryResult->update(['name' => $req->json('login')]);
        }

        if ($req->json('password') !== null) {
            $queryResult->update(['password' => $req->json('password')]);
        }

        //TODO Набор полей не должен отличаться от get()
        echo json_encode($queryResult->get());
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
        //TODO При регистрации пользователя у него обязан быть уникальный логин потому что мы по нему ищем
        DB::table('users')->insert([
            'name' => $req->json('login'),
            'email' => 'default@mail.ru',
            'password' => $req->json('password')
        ]);
        echo json_encode([
            'id' => DB::table('users')->where('name', $req->json('login'))->get()
        ]);
    }

}
