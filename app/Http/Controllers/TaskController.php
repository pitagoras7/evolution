<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tasks = Task::All();

     return view('task.index')->with('tasks',$tasks);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

/*
          $tsk = new Task($request->all());
          $tsk->name = "title";
          $tsk->priority = "normal";
          $tsk->expiration_at = "2017-09-09";
          $tsk->user_id = "2";
          $tsk->save();
  */
          echo json_encode($request);
          header("Content-type:application/json");


        }


        public function externo(Request $request)
        {

          $data = session('user');
          $tsk = new Task($request->all());
          $tsk->user_id = $data->id;
          $tsk->expiration_at = $request->expiration_at; 
          echo json_encode($tsk->save());
        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
      $task =  Task::Find($id);    
      echo json_encode($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {

     $task =  Task::Find($id); 
     $task->name = $request->name;   
     $task->priority = $request->priority;   
     $task->estatus = $request->estatus;   
     $task->expiration_at = $request->expiration_at;   
     echo json_encode($task->save());

   }




   public function listAll()
   {

    $data = session('user');
    $id =  $data->id;  

    $sql ="SELECT *, datediff( expiration_at , CURDATE() ) as dif FROM tasks where archived = 'no'and datediff( expiration_at, CURDATE() ) >= 0  and user_id in ( ? ) order by  expiration_at asc, estatus desc , priority asc";

    $tasks = DB::select($sql,[$id]);

    echo json_encode($tasks);  
  }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


     $task =  Task::Find($id); 
     $task->archived = 'yes';
     $task->archived_at = date('Y-m-d');
     echo json_encode($task->save());



   }
 }
