<?php

use Illuminate\Database\Seeder;
use App\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'id' => 1,
            'image' => 'assets/images/notifications/reminder.png',
            'title' => 'Follow Up Reminder',
            'message' => '{CONTACT} Follow Up Reminder. Go to "My Task" to complete action.',
            'type' => 'reminder',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 2,
            'image' => 'assets/images/notifications/thumbs-down.png',
            'title' => '{CONTACT} not interested',
            'message' => '{REASON_NOT_INTERESTED}',
            'type' => 'not-interested',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 3,
            'image' => 'assets/images/notifications/order.png',
            'title' => 'New Order Update',
            'message' => '{STEP_TITLE} was completed by {COMPANY} for {CONTACT}.',
            'type' => 'step-completed',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 4,
            'image' => 'assets/images/notifications/video.png',
            'title' => 'Video Started',
            'message' => '{CONTACT} is watching the video titled {VIDEO_TITLE}.',
            'type' => 'video',
            'sound' => 's_tracking',
            'android_channel_id' => 'tracking',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 5,
            'image' => 'assets/images/notifications/order.png',
            'title' => 'New Order Submitted',
            'message' => '{CONTACT} submitted an new order.',
            'type' => 'new-order',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 6,
            'image' => 'assets/images/notifications/cross.png',
            'title' => 'Order Canceled',
            'message' => 'Order was canceled for {CONTACT} by {COMPANY}. Please review the message in todays task to learn more.',
            'type' => 'order-cancelled',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 7,
            'image' => 'assets/images/notifications/faq.png',
            'title' => 'Article Read',
            'message' => '{CONTACT} read the article on {ARTICLE_TITLE}',
            'type' => 'article-read',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 8,
            'image' => 'assets/images/notifications/brochure.png',
            'title' => 'Booklet Read',
            'message' => '{CONTACT} has read the Booklet. Nice Job {USER}!',
            'type' => 'brochure-read',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 9,
            'image' => 'assets/images/notifications/brochure.png',
            'title' => 'Booklet Downloaded',
            'message' => '{CONTACT} downloaded the software-demand.com Booklet',
            'type' => 'brochure-downloaded',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 10,
            'image' => 'assets/images/notifications/appointment.png',
            'title' => 'New Appointment',
            'message' => 'You have an appointment right now with {CONTACT}!',
            'type' => 'appointment-now',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 11,
            'image' => 'assets/images/notifications/support.png',
            'title' => 'New Ticket',
            'message' => 'A new ticket from {FROM} has been submitted for titled {TITLE}.',
            'type' => 'new-ticket',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 12,
            'image' => 'assets/images/notifications/support.png',
            'title' => 'New Reply',
            'message' => 'A new reply from {FROM} has been posted for the support ticket titled {TITLE}.',
            'type' => 'new-reply',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 13,
            'image' => 'assets/images/notifications/new_lead.png',
            'title' => 'New Opt In Page Lead',
            'message' => 'Just in! A new opt in page lead.',
            'type' => 'new-lead',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 14,
            'image' => 'assets/images/notifications/new_lead.png',
            'title' => 'New Opt In Page Lead Handoff',
            'message' => 'Just in! A new opt in page lead handed off to {SALES_SUPPORT}. We will keep you informed on the progress.',
            'type' => 'handedoff-lead',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 15,
            'image' => 'assets/images/notifications/new_lead.png',
            'title' => 'New Handoff Referral',
            'message' => 'Just in! A new handoff referral from {FROM}',
            'type' => 'new-handoff-referral',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 16,
            'image' => 'assets/images/notifications/new_lead.png',
            'title' => 'New Team Support Referral',
            'message' => 'Just in! A new team support referral from {FROM}',
            'type' => 'new-team-support-referral',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 17,
            'image' => 'assets/images/notifications/flame.png',
            'title' => 'New Hot Lead',
            'message' => '{CONTACT} became a hot lead. Go to "Hot Lead" for activity details.',
            'type' => 'third-base',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 18,
            'image' => 'assets/images/notifications/flame-green.png',
            'title' => 'Education Completed',
            'message' => '{CONTACT} software-demand.com completed education! Connect with team support to move customer forward.',
            'type' => 'ki-completed',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 19,
            'image' => 'assets/images/notifications/testimonial-video.png',
            'title' => 'Video Started',
            'message' => '{CONTACT} is watching the testimonial video from {VIDEO_TITLE}.',
            'type' => 'testimonial-video-started',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 20,
            'image' => 'https://dev.springaqua.com/api/assets/images/money.png',
            'title' => 'Commission Paid',
            'message' => 'We paid you, congrats.',
            'type' => 'commission-paid',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 21,
            'image' => 'assets/images/notifications/new.png',
            'title' => 'Commission Posted',
            'message' => 'A new commission posted. Go to "My B.O.B" for details.',
            'type' => 'commission-posted',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 22,
            'image' => 'assets/images/notifications/reminder.png',
            'title' => 'Reset Funnel',
            'message' => ' {CONTACT} funnel has been reset.',
            'type' => 'reset-funnel',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 23,
            'image' => 'assets/images/notifications/reminder.png',
            'title' => 'New Personal Notes',
            'message' => '{USER} added personal note',
            'type' => 'personal-notes',
            'sound' => 's_new_order',
            'android_channel_id' => 'new_order',
            'navigate_to' => '/tasks-list'
        ]);

        Notification::create([
            'id' => 24,
            'image' => 'assets/images/notifications/reminder.png',
            'title' => 'New Appointment',
            'message' => 'You have an appointment in an hour. This is now in your Today\'s Task awaiting your completion.',
            'type' => 'appointment-task',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);

        Notification::create([
            'id' => 25,
            'image' => 'assets/images/customer.png',
            'title' => 'Congratulations!',
            'message' => 'Congratulations! You\'re an agent now',
            'type' => 'become-agent',
            'sound' => 's_update',
            'android_channel_id' => 'update',
            'navigate_to' => '/notifications'
        ]);
    }
}
