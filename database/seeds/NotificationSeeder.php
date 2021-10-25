<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'status' => 1,
                'sender_id' => 2,
                'reciever_id' => 5,
                'title' => 'Iterview Schedule Notification 1',
                'message' => 'Iterview Schedule check you Email 1',
            ],
            [
                'status' => 1,
                'sender_id' => 2,
                'reciever_id' => 5,
                'title' => 'Iterview Schedule Notification 2',
                'message' => 'Iterview Schedule check you Email 2',
            ],
            [
                'status' => 1,
                'sender_id' => 2,
                'reciever_id' => 5,
                'title' => 'Iterview ReSchedule Notification 1',
                'message' => 'Iterview ReSchedule check you Email 1',
            ],

        ]);
    }
}
