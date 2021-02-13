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

    public function test_user()
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
            'name'=>'project1',
            'email'=>'username1@domain.com',
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


    function test_addProjectFile(){
        $data = [
            'project_name'=>'project1',
            'email'=>'username1@domain.com',
            'file_name'=>'new_file1.txt',
            'content'=>'Content txt..'
        ];
        $response = $this->post('add-file',$data);

        $this->assertJson($response);
    }


    function test_getFile(){
        $response = $this->get('get-file/new_file1.txt');
        $this->assertJson($response);
    }

    function test_getFileNodes(){
        $response = $this->get('get-file-nodes');
        $this->assertJson($response);
    }

    function test_addFileImage(){
        $data = [
            'project_file_name'=>'new_file1.txt',
            'image_path'=>'image_path/actual_image.ext'
        ];
        $response = $this->post('add-file-image',$data);

        $this->assertJson($response);
    }

    function test_getProjectFileImages(){
        $response = $this->get('get-file-images/new_file1.txt');
        $this->assertJson($response);
    }

    function test_addProjectFileVersion(){
        $response = $this->get('add-file-version/new_file1.txt');
        $this->assertJson($response);
    }

    function test_getProjectFileVersions(){
        $response = $this->get('get-file-versions/new_file1.txt');
        $this->assertJson($response);
    }

    function test_getProjectFileImageFills(){

        $response = $this->get('get-image-fills/new_file1.txt');
        $this->assertJson($response);

    }

    function test_addProjectComment(){
        $data = [
            'project_name'=>'project1',
            'comment'=>'new comment 1'
        ];

        $response = $this->post('add-comment',$data);

        $this->assertJson($response);

    }

    function test_getProjectComments(){

        $response = $this->get('get-comments/project1');
        $this->assertJson($response);

    }

    function test_getMe(){
        $response = $this->get('get-me/username1@domain.com');
        $this->assertJson($response);
    }










}
