<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\WebPushConfig;
use Illuminate\Http\Request;

class FirebaseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRef = null;
        $testData = [
            'name' => 'vocaotri',
            'email' => 'vocaotri789@gmail.com',
        ];
        try {
            $this->database->getReference('users')->push($testData);
            $userRef = $this->database->getReference('users')
                ->orderByKey()
                ->getSnapshot();
        } catch (\Exception $exception) {
            dd($exception);
        }
        dd($userRef->getValue());
    }

    public function sendNotify()
    {
        $config = WebPushConfig::fromArray([
            'fcm_options' => [
                'link' => 'https://www.kenh14.com/'
            ],
        ]);
        $deviceToken = 'd0g0wiNvxzvLSaCEK2k8w4:APA91bHqDCvTaQ6NVCHLjcc97DYHf3JeosMReqJC-56gdSu53tAQGs73pib_AlVpXD8IIEHS8n5PW01auombBXXpumDM3s1RWS9MNrIYzGIhRJHjIafNnVa20m9hUt0Kj-cawuBQHBnm';
        $message = CloudMessage::fromArray([
            'token' => $deviceToken,
            'notification' => [
                'title' => "xin chào",
                'body' => "alo alo",
                'image'=> "http://lorempixel.com/400/200/"
            ], // optional
            'data' => [], // optional
        ])->withWebPushConfig($config);
        $this->messaging->send($message);
        return "push success";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
