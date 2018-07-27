<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * Routes for resource curso-controller
 */


/**
 * Routes for resource curso
 */
$router->get('cursos', 'CursosController@todosCursos');
$router->get('editar-curso/{id}', 'CursosController@editarCurso');
$router->post('curso', 'CursosController@adicionarCurso');
$router->put('curso/{id}', 'CursosController@salvarCurso');
$router->delete('curso/{id}', 'CursosController@deletarCurso');

/**
 * Routes for resource aluno
 */
$router->get('aluno', 'AlunosController@all');
$router->get('aluno/{id}', 'AlunosController@get');
$router->post('aluno', 'AlunosController@adicionarAluno');
$router->put('aluno/{id}', 'AlunosController@put');
$router->delete('aluno/{id}', 'AlunosController@remove');

/**
 * Routes for resource user
 */
$router->get('user', 'UsersController@all');
$router->get('user/{id}', 'UsersController@get');
$router->post('user', 'UsersController@add');
$router->put('user/{id}', 'UsersController@put');
$router->delete('user/{id}', 'UsersController@remove');
$router->post('user/checktoken', 'UsersController@checkToken');
