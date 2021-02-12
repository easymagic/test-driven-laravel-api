<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;



    function createProject($data){
       $this->name = $data['name'];
       $this->created_by = User::getUserIdFromEmail($data['email']);
       $this->save();
       return [
           'name'=>$this->name,
           'created_by'=>$data['email']
       ];
    }

    static function getProjectIdFromName($name){
        $query = (new self)->newQuery();
        $query = $query->where('name',$name);
        return $query->first()->id;
    }


}
