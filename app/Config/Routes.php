<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;
use App\Controllers\ProfilesController;
use App\Controllers\DocumentsController;
use App\Controllers\ExamSubjectsController;
use App\Controllers\PublicPagesController;
use App\Controllers\FeedBackController;
use App\Controllers\Ratings;

/**
 * @var RouteCollection $routes
 */
/** ADMIN: EXIT  */
$routes->get('/admin/exit/', [UserController::class, 'exit']);
$routes->get('/exit/', [UserController::class, 'exit']);

/** ADMIN: AUTH  */
$routes->match(["post","get"],'/admin/', [UserController::class, 'auth']);

/** ADMIN: PROFILES */
$routes->get('/admin/profiles', [ProfilesController::class, 'adminList']);
$routes->get('/admin/profiles/add', [ProfilesController::class, 'form/add']);
$routes->get('/admin/profiles/edit/(:num)', [ProfilesController::class, 'form/edit/$1/$2']);
$routes->post('/admin/profiles/form-processing', [ProfilesController::class, 'formProcessing']);
$routes->get('/admin/profiles/delete/(:num)', [ProfilesController::class, 'delete/$1']);
$routes->post('/admin/profiles/change-visible/', [ProfilesController::class, 'changeVisible']);
$routes->post('/admin/profiles/set-filter', [ProfilesController::class, 'setFilter']);

/** ADMIN: DOCUMENTS */
$routes->get('/admin/documents', [DocumentsController::class, 'adminList']);
$routes->get('/admin/documents/add', [DocumentsController::class, 'form/add']);
$routes->get('/admin/documents/edit/(:num)', [DocumentsController::class, 'form/edit/$1/$2']);
$routes->post('/admin/documents/form-processing', [DocumentsController::class, 'formProcessing']);
$routes->get('/admin/documents/delete/(:num)', [DocumentsController::class, 'delete/$1']);
$routes->post('/admin/documents/change-visible/', [DocumentsController::class, 'changeVisible']);
$routes->post('/admin/documents/set-filter', [DocumentsController::class, 'setFilter']);

/** ADMIN: EXAM SUBJECTS */
$routes->get('/admin/exam-subjects', [ExamSubjectsController::class, 'adminList']);
$routes->get('/admin/exam-subjects/add', [ExamSubjectsController::class, 'form/add']);
$routes->get('/admin/exam-subjects/edit/(:num)', [ExamSubjectsController::class, 'form/edit/$1/$2']);
$routes->post('/admin/exam-subjects/form-processing', [ExamSubjectsController::class, 'formProcessing']);
$routes->get('/admin/exam-subjects/delete/(:num)', [ExamSubjectsController::class, 'delete/$1']);

/** PUBLIC: MAIN PAGE */
$routes->get('/', [PublicPagesController::class, "main"]);
$routes->get('/contacts/', [PublicPagesController::class, "contacts"]);
$routes->get('/why-melgu/', [PublicPagesController::class, "whyMelGU"]);
$routes->get('/why-melitopol/', [PublicPagesController::class, "whyMelitopol"]);
$routes->get('/documents/', [PublicPagesController::class, "documents"]);

/** PUBLIC: FEEDBACK */
$routes->match(["get","post"],'/feedback/',                 [FeedBackController::class, 'processing']);
$routes->match(["get","post"],'exam-results',               [Ratings::class, 'Results']);

