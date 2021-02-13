<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\User;
use Illuminate\Http\Request;

class ApiCollectionController extends Controller
{
    //

    function createUser(){
      return (new User)->createUser([
          'name'=>request('name'),
          'email'=>request('email'),
          'password'=>request('password')
      ]);
    }

    function getUser($email){
       return User::getUserFromEmail($email);
    }

    function addProject(){
        $data = [
            'name'=>request('name'),
            'email'=>request('email')
        ];

        return (new Project)->createProject($data);

    }

    function getFile(ProjectFile $projectFile){

    }

    function getFileNodes(){

    }

    function getFileImages(ProjectFile $projectFile){

    }

    function getFileVersions(ProjectFile $projectFile){

    }

    function getImageFills(ProjectFile $projectFile){

    }

    function getComments(Project $project){

    }

    function addComment(){

    }

    function getMe(User $user){

    }
    function getUsers(){

    }

    function getProjects(){
      return [
          'list'=>Project::all()
      ];
    }

    function getProjectFiles(Project $project){

    }


}
