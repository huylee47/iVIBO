<?php

namespace App\Service\admin;
use App\Models\Task;
class TaskService {
    public function index(){
        $tasks = Task::with('project:id,project_name');
        return response()->json($tasks);
    }
}