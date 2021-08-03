<?php

namespace App\Http\Controllers;


use App\Services\FirebaseService;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    protected $firebase;
    protected $database;
    protected $messaging;
    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->firebase;
        $this->database = $this->firebase->createDatabase();
        $this->messaging = $this->firebase->createMessaging();
    }
}
