<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request)
    {
        return view('user.list');
    }

    public function testShow(Request $request, int $id)
    {
        $uri = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();

        $httpMethod = $request->method();

        // /users/test/33?name=Tom&nick=boss
        $all = $request->all();
        //dd($all);

        $name = $request->input('name');
        $lastName = $request->input('lastName', 'Kowalski');

        //http://127.0.0.1:8000/users/test/33?name=Tom&nick=boss&games[]=quake&games[][name]=turok
        $game = $request->input('games');
        $game = $request->input('games.1');
        $game = $request->input('games.1.name');

        $allQuery = $request->query();
        $name = $request->query('name');
        $name = $request->query('name', 'Nowak');

        $expired = $request->boolean('expired');

        $hasName = $request->has('name');
        $hasParams = $request->has(['name', 'nick']);
        $hasAnyParams = $request->hasAny(['name', 'nick1']);

        $cookies = $request->cookie('my_cookie');

        $input = $request->input();
        $query = $request->query();

        dd($input, $query);

        dump($request);
        dd($id);
    }

    public function testStore(Request $request, int $id)
    {
        if (!$request->isMethod('post')) {
            return 'Nie jest post';
        }

        $all = $request->all();

        $allQuery = $request->query();

        dump($allQuery);
        dd($all);
    }
}
