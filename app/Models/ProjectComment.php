<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
    use HasFactory;

    function createProjectComment($data){
        $this->project_id = Project::getProjectIdFromName($data['name']);
        $this->comment = $data['commment'];
        $this->save();

        return [
            'comment'=>$this->comment,
            'project_id'=>$this->project_id
        ];
    }
}
