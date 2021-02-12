<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFileVersion extends Model
{
    use HasFactory;

    function createProjectFileVersion($projectFileId){
        $data = ProjectFile::find($projectFileId);

        $this->project_file_id = $projectFileId;
        $this->created_by = $data->created_by;
        $this->name = $data->name;
        $this->contents = $data->contents;
        $this->save();

        return [
            'message'=>'Logged',
            'error'=>false
        ];

    }
}
