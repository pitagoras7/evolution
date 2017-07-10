<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
   protected $table = 'tasks';
 

    protected $fillable = [
        'name', 'expiration_at', 'priority','estatus',
    ];



public function notification(){

$data = session('user');



     $sql ="SELECT *, datediff( expiration_at , CURDATE() ) as dif FROM tasks where archived = 'no'and datediff( expiration_at, CURDATE() ) >= 0 and datediff( expiration_at, CURDATE() ) <= 2 and user_id in (".$data->id.") order by  expiration_at asc, estatus desc , priority asc";
     
     $tasks = DB::select($sql);

     return $tasks;
}


}
