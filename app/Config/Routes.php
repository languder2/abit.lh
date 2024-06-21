<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;
use App\Controllers\ProfilesController;
use App\Controllers\ExamSubjectsController;

/**
 * @var RouteCollection $routes
 */
/** ADMIN: EXIT  */
$routes->get('/admin/exit/', [UserController::class, 'exit']);
$routes->get('/exit/', [UserController::class, 'exit']);
/** ADMIN: AUTH  */
$routes->match(['get','post'],'/admin/', [UserController::class, 'auth']);
/** PROFILES */
$routes->match(['get','post'],'/admin/profiles', [ProfilesController::class, 'adminList']);
$routes->match(['get','post'],'/admin/profiles/add', [ProfilesController::class, 'form/add']);
$routes->match(['get','post'],'/admin/profiles/edit/(:num)', [ProfilesController::class, 'form/edit/$1/$2']);
$routes->match(['get','post'],'/admin/profiles/form-processing', [ProfilesController::class, 'formProcessing']);
/** EXAM SUBJECTS */
$routes->match(['get','post'],'/admin/exam-subjects', [ExamSubjectsController::class, 'adminList']);
$routes->match(['get','post'],'/admin/exam-subjects/add', [ExamSubjectsController::class, 'form/add']);
$routes->match(['get','post'],'/admin/exam-subjects/edit/(:num)', [ExamSubjectsController::class, 'form/edit/$1/$2']);
$routes->match(['get','post'],'/admin/exam-subjects/form-processing', [ExamSubjectsController::class, 'formProcessing']);
$routes->match(['get','post'],'/admin/exam-subjects/delete/(:num)', [ExamSubjectsController::class, 'delete/$1']);
