<?php

namespace App\Services;

use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseService
{
    /**
     * @var Firebase
     */
    public $firebase;

    public function __construct()
    {
        $this->firebase = (new Factory)
            ->withServiceAccount(__DIR__ .'/pushnotifications-262201-firebase-adminsdk-y7zmb-c85aef9557.json')
            ->withDatabaseUri('https://pushnotifications-262201.firebaseio.com/');
    }
    /**
     * Verify password agains firebase
     * @param $email
     * @param $password
     * @return bool|string
     */
    public function verifyPassword($email, $password)
    {
        try {
            $response = $this->firebase->getAuth()->verifyPassword($email, $password);
            return $response->uid;
        } catch (FirebaseEmailExists $e) {
            logger()->info('Error login to firebase: Tried to create an already existent user');
        } catch (\Exception $e) {
            logger()->error('Error login to firebase: ' . $e->getMessage());
        }
        return false;
    }
}
