<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    function createProjectFile($data){
        $this->project_id = Project::getProjectIdFromName($data['name']);
        $this->created_by = User::getUserIdFromEmail($data['email']);
        $this->name = $data['name'];
        $this->contents = $data['contents'];
        $this->save();

        return [
            'project_id'=>$this->project_id,
            'created_by'=>$data['email'],
            'name'=>$this->name,
            'contents'=>$this->contents
        ];
    }


    static function getIdFromProjectFileName($name){
        $query = (new self)->newQuery();
        $query = $query->where('name',$name);
        return $query->first()->id;
    }
}
