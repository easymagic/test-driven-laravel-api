<?php

namespace Tests\Unit;

use http\Client;
use PHPUnit\Framework\TestCase;

class ApiCollectionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    function post($api,$data){
        $client = (new \GuzzleHttp\Client()); //->post($api,$data);
        $response = $client->request('POST','http://127.0.0.1:8000/api/' . $api,[
            'form_params'=>$data
        ]);
        return json_encode($response->getBody()->getContents());
    }

    function stringify($arr){
        return json_encode($arr);
    }

    public function test_example()
    {
        $data = [
            'name'=>'Test Name',
            'email'=>'username1@domain.com',
            'password'=>'password123'
        ];

        $response = $this->post('create-user',$data);


        $this->assertJson($response,$this->stringify([
            'name'=>$data['name'],
            'email'=>$data['email']
        ]));


    }

}
