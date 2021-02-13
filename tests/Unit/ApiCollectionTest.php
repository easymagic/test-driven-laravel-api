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

    function get($api){
        $client = (new \GuzzleHttp\Client()); //->post($api,$data);

        $response = $client->request('GET','http://127.0.0.1:8000/api/' . $api);

        return json_encode($response->getBody()->getContents());
    }

    function stringify($arr){
        return json_encode($arr);
    }

    public function test_example()
    {


        $email = 'username1@domain.com';
        //test case create user
        $data = [
            'name'=>'Test Name',
            'email'=>$email,
            'password'=>'password123'
        ];

        $response = $this->post('create-user',$data);


        $this->assertJson($response,$this->stringify([
            'name'=>$data['name'],
            'email'=>$data['email']
        ]));


        $this->test_getUser($email);


    }

    function test_getUser(){

        $email = 'username1@domain.com';

        $response = $this->get('get-user/' . $email);


        $this->assertJson($response,$this->stringify([
            'email'=>$email
        ]));


    }

    function test_addProject(){

        $data = [
            'name'=>'project name' . date('h:i:s'),
            'email'=>'username1@domain.com'
        ];

        $response = $this->post('add-project',$data);

        $this->assertJson($response,$this->stringify([
            'email'=>'username1@domain.com'
        ]));

    }

    function test_getProjects(){
        $response = $this->get('get-projects');
        $this->assertJson($response,$this->stringify([
            'list'=>[]
        ]));
    }




}
