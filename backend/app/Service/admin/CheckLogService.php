<?php

namespace App\Service\admin;
use App\Models\check_log;
class CheckLogService {
    public function index() {
        $check_logs = check_log::with('user:id,name')->get();
        return response()->json($check_logs->map(function($check_log){
            return [
                "id" => $check_log->id,
                "user_id" => $check_log->user ? $check_log->user->name : null,
                "location_check" => $check_log->location_check,
                "check_in_time" => $check_log->check_in_time,
            ];
        }
    ));
}
}