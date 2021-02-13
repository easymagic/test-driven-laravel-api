<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFileImage extends Model
{
    use HasFactory;

    function createProjectFileImage($data){
        $this->project_file_id = ProjectFile::getIdFromProjectFileName($data['project_file_name']);
        $this->image_path = $data['image_path'];
        $this->save();

        return [
            'image_path'=>$this->image_path,
            'profile_file_name'=>$data['project_file_name']
        ];

    }

    static function fetch($projectFileName){

        $project_file_id = ProjectFile::getIdFromProjectFileName($projectFileName);
        return (new self)->newQuery()->where('project_file_id',$project_file_id);

    }

    static function fetchImageFills($projectFileName){
        
    }


}
