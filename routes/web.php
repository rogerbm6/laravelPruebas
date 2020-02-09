<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;

Route::get('/consulta', function () {
    //$usuarios=DB::table('users');
    //$usuarios=DB::table('users')->get();
    //$usuarios=DB::table('users')->first();
    //$usuarios=DB::table('users')->select('email')->get();
    //$usuarios=DB::table('users')->select(['email', 'name'])->get();
    $usuarios=DB::table('entradas')->select(['titulo', 'contenido'])->where('user_id', "=", 2)->get();

    dd($usuarios);
});

//query builder
//Todas las entradas que tengan en el título la palabra Laravel (operador like)
Route::get('/like', function () {
    $like =  DB::table('entradas')
                ->where('titulo', 'like', '%laravel%')
                ->get();
    dd($like);
});
//Todas las entradas que tengan en el título la palabra Laravel y la palabra php
//(operador like con dos where).
Route::get('/likephp', function () {
    $like =  DB::table('entradas')->where('titulo', 'like', '%laravel%')->where('titulo', 'like', '%php%')->get();
    dd($like);
});

//Todas las entradas que tengan en el título la palabra Laravel o la palabra php
//(operador like con orWhere).
Route::get('/likeOrphp', function () {
    $like =  DB::table('entradas')->where('titulo', 'like', '%laravel%')->orWhere('titulo', 'like', '%php%')->get();
    dd($like);
});

//Utiliza el método toSql para mostrar la sentencia SQL de la consulta anterior
//(->toSql()).
Route::get('/tosql', function () {
    $like =  DB::table('entradas')->where('titulo', 'like', '%laravel%')->orWhere('titulo', 'like', '%php%')->toSql();
    dd($like);
});

//Haz un join de la tabla usuarios y entradas..
Route::get('/join', function () {
    $like =  DB::table('users')->join('entradas','users.id', '=', 'entradas.user_id')->get();
    dd($like);
});

//Haz un insert en la tabla usuarios.
Route::get('/insert', function () {
    $like =  DB::table('users')->insert(
      [
      'name'     => 'jesus',
      'email'    => 'arribi3@outlook.com',
      'password' => 'soyUnCrack'
      ]
      );
    dd($like);
});

//Haz un insert de dos usuarios al mismo tiempo en la tabla usuarios.
Route::get('/insertdoble', function () {
    $like =  DB::table('users')->insert(
      [
        [
          'name'     => 'jesus2',
          'email'    => 'arribi4@outlook.com',
          'password' => 'soyUnCrack'
        ],
        [
          'name'     => 'jesus3',
          'email'    => 'arribi5@outlook.com',
          'password' => 'soyUnCrack'
        ]
      ]
      );
    dd($like);
});

//Haz un insert utilizando el método insertGetId.
Route::get('/insertgetid', function () {
    $like =  DB::table('users')->insertGetId(
      [
        'name'     => 'roger',
        'email'    => 'roger@outlook.com',
        'password' => 'soyUnCrack'
      ]
      );
    dd($like);
});

//Actualiza el correo del usuario 2.
Route::get('/update', function () {
    $like =  DB::table('users')->where('id',2)->update(
      ['email'    => 'prueba@prueba.tk']);
    dd($like);
});

//Borra el usuario con id 3.
Route::get('/delete', function () {
    $like =  DB::table('users')->where('id',3)->delete();
    dd($like);
});

Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('auth/login', function () {
    return 'Login usuario';
});

Route::get('auth/logout', function () {
    return 'Logout usuario';
});

Route::get('catalog', function () {
    return 'Listado de clientes';
});

Route::get('catalog/show/{id}', function ($id) {
    return "Detalles del ciente {$id}";
});

Route::get('catalog/create', function () {
    return 'Alta de un cliente';
});

Route::get('catalog/edit/{id}', function ($id) {
    return "Modifica los datos del cliente {$id}";
});

Route::get('catalog/delete/{id}', function ($id) {
    return "Elimina los datos del cliente {$id}";
});


//rutas de la práctica
Route::get('prueba1/{nombre?}', function ($nombre) {
    return "El nombre de usuario es: {$nombre}";
});

Route::get('prueba2/{nombre?}', function ($nombre="anonimo") {
    return "El nombre de usuario es: {$nombre}";
});

Route::post('prueba3', function () {
    return "Post funciona!!!!";
});

Route::match(['get', 'post'], 'prueba4', function () {
    return "Post y Get funcionan!!!!";
});

Route::get('prueba5/{id}', function ($id) {
    return "El usuario tiene el id: $id";
})->where('id', '[0-9]+');


Route::get('prueba6/{id}/{nombre}', function ($id, $nombre) {
    return "El usuario tiene el id: $id y se llama $nombre";
})->where(['id' => '[0-9]+', 'nombre' => '[a-z]+']);

//env
Route::get('host', function () {
    $ip=env('DB_HOST');
    return "la ip de la base de datos es $ip";
});

Route::get('timezone ', function () {
    $zona =config('app.timezone');
    return "la zona horaria es $zona";
});

Route::get('/probarconexion', function () {
    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("no se puede conectar a la base de datos. Revise su configuracion".$e);
    }
});
