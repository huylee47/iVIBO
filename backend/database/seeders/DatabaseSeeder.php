<?php

namespace Database\Seeders;

use App\Models\Assignment_request;
use App\Models\check_log;
use App\Models\Leave_request;
use App\Models\Project;
use App\Models\Role;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker = Faker::create();

        $roles = [
            'Quản lý',
            'Nhân viên',
            'Kỹ sư',
            'Chuyên viên',
            'Trưởng phòng',
            'Giám đốc',
            'Nhân viên hành chính',
            'Nhân viên kinh doanh',
            'Nhân viên IT',
            'Nhân viên marketing'
        ];
        $status =[
            'Hoàn thành',
            'Chưa hoàn thành',
            'Đang thực hiện',
            'Chậm tiến độ',
            'Tạm dừng',
            'Đã hủy',
        ];
        foreach ($roles as $role) {
            Role::create([
                'role_name' => $role,
            ]);
        }
        foreach ($status as $stt) {
            Status::create([
                'status_name' => $stt,
            ]);
        }
        foreach (range(1,10) as $index) {
        check_log::factory()->create([
            'user_id'=> $faker->numberBetween(1,20),
            'location_check'=> $faker->ipv4, 
            'check_in_time' => $faker->dateTime,       
        ]);
        User::factory()->create([
            'name' => $faker->name,
            'username' => $faker->unique()->userName, 
            'email' => $faker->email,
            'avatar' => $faker->imageUrl(), 
            'address' => $faker->address,
            'phone_number' => '0' . $faker->numerify('#########'),
            'role_id' => $faker->numberBetween(1, 10),
            'status' => $faker->numberBetween(1, 4),
            'password' => bcrypt($faker->password), 
            'limit_remaining'=>$faker->numberBetween(0, 10),
            'remember_token' => $faker->regexify('[A-Za-z0-9]{10}'), 
        ]);
        Project::factory()->create([    
            'project_name'=> 'Project '  . $index, 
            'status' => $faker->numberBetween(1, 6),
        ]);
        Task::factory()->create([
            'project_id'=> $faker->numberBetween(1, 20), 
            'task_name'=> 'Task ' . $index, 
            'status' => $faker->numberBetween(1, 6), 
            'user_id' => $faker->numberBetween(1, 20),
        ]);
        Assignment_request::factory()->create([
            'user_request_id'=> $faker->numberBetween(1, 20), 
            'user_access_id'=> $faker->numberBetween(1, 20), 
            'location_assignment'=> $faker->city(), 
            'reason'=> $faker->text(200), 
            'start_time'=> $faker->dateTimeBetween('-30 days', '+30 days'), 
            'end_time'=> $faker->dateTimeBetween('+30 days', '+60 days'),
        ]);   
        Leave_request::factory()->create([
            'user_request_id'=> $faker->numberBetween(1, 20), 
            'user_access_id'=> $faker->numberBetween(1, 20), 
            'type'=> $faker->numberBetween(1, 2), 
            'leave_time'=> $faker->numberBetween(1, 2), 
            'reason'=> $faker->text(200), 
            'start_time'=> $faker->dateTimeBetween('-30 days', '+30 days'), 
            'end_time'=> $faker->dateTimeBetween('+30 days', '+60 days'),
        ]);
        }

    }
}
