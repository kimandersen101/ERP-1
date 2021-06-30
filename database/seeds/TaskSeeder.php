<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'notification_id' => 1,
            'key' => 'reminder',
            'title' => 'Reminder set by you',
            'icon' => 'assets/images/task/reminder.png'
        ]);

        Task::create([
            'notification_id' => 6,
            'key' => 'order-cancelled',
            'title' => 'Order Canceled By',
            'icon' => 'assets/images/task/cross.png'
        ]);

        Task::create([
            'notification_id' => 24,
            'key' => 'appointment',
            'title' => 'Appointment set for: ',
            'icon' => 'assets/images/task/appointment.png'
        ]);

        Task::create([
            'key' => 'reset-funnel',
            'title' => 'Reset Funnel',
            'icon' => 'assets/images/task/reset.png'
        ]);

        Task::create([
            'key' => 'new-referral',
            'title' => 'New referral',
            'icon' => 'assets/images/task/new_lead.png'
        ]);

        Task::create([
            'key' => 'new-lead',
            'title' => 'New Lead',
            'icon' => 'assets/images/task/new_lead.png'
        ]);
    }
}
