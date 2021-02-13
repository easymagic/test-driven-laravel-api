<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFileVersion extends Model
{
    use HasFactory;

    function createProjectFileVersion($projectFileName){
        $data = ProjectFile::getFromProjectFileName($projectFileName); // find($projectFileId);

        $this->project_file_id = $data->id;
        $this->created_by = $data->created_by;
        $this->name = $data->name;
        $this->contents = $data->contents;
        $this->save();

        return [
            'message'=>'Logged',
            'error'=>false
        ];

    }

    static function fetch($projectFileName){
        $project_file_id = ProjectFile::getIdFromProjectFileName($projectFileName);
        return (new self)->newQuery()->where('project_file_id',$project_file_id);
    }


}
