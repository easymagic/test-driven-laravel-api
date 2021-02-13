<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\ProjectFileImage;
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

    function addFile(){
        $data = [
            'project_name'=>request('project_name'),
            'email'=>request('email'),
            'file_name'=>request('file_name'),
            'contents'=>request('contents')
        ];
        $response = (new ProjectFile)->createProjectFile($data);
        return $response;
    }

    function getFile($projectFileName){
       return ProjectFile::getFromProjectFileName($projectFileName);
    }

    function getFileNodes(){
      return [
          'list'=>ProjectFile::all()
      ];
    }

    function addFileImage(){

      $data = [
          'project_file_name'=>request('project_file_name'),
          'image_path'=>request('image_path')
      ];

      $response = (new ProjectFileImage)->createProjectFileImage($data);
      return $response;

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
