<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(AgentSeeder::class);
//        $this->call(LeadSeeder::class);
//        $this->call(RoleUserSeeder::class);
        $this->call(KiStateSeeder::class);
        $this->call(FunnelStepSeeder::class);
        $this->call(TouchCategorySeeder::class);
        $this->call(InterestSeeder::class);
        $this->call(ScriptSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(TouchSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(BookletSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(PromoSeeder::class);
        $this->call(ProductSeeder::class);
//        $this->call(ActivitySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(MailjetTempleteSeeder::class);
        $this->call(P1ValiditySeeder::class);
//        $this->call(AgentCalendarSettingSeeder::class);
//        $this->call(UserAddressSeeder::class);
//        $this->call(OrderSeeder::class);
//        $this->call(OrderItemSeeder::class);
//        $this->call(OrderItemDetailSeeder::class);
        $this->call(TicketCategorySeeder::class);
        $this->call(CommissionDefaultSeeder::class);
        $this->call(HelpVideoSeeder::class);

    }
}
