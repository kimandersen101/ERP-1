<?php

use Illuminate\Database\Seeder;
use App\KiState;

class KiStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KiState::create(['id' => 1, 'rule' => "DIRECT_HANDOFF"]);
        KiState::create(['id' => 2, 'rule' => "GROUP_CHAT"]);
        KiState::create(['id' => 3, 'rule' => "READY_TO_BUY_YES"]);
        KiState::create(['id' => 4, 'rule' => "READY_TO_BUY_NO"]);
        KiState::create(['id' => 5, 'rule' => "HANDED_OFF"]);
        KiState::create(['id' => 6, 'rule' => "REFERRAL"]);
        KiState::create(['id' => 7, 'rule' => "RECENTLY_MET"]);
        KiState::create(['id' => 8, 'rule' => "PERMISSION_NO"]);
        KiState::create(['id' => 9, 'rule' => "EDUCATIONAL_VIDEO"]);
        KiState::create(['id' => 10, 'rule' => "BOOKLET"]);
        KiState::create(['id' => 11, 'rule' => "ARTICLE"]);
        KiState::create(['id' => 12, 'rule' => "PURCHASE"]);
        KiState::create(['id' => 13, 'rule' => "AFFILIATE_LINK"]);
        KiState::create(['id' => 14, 'rule' => "TESTIMONIAL_VIDEO"]);
        KiState::create(['id' => 15, 'rule' => "APPOINTMENT"]);
        KiState::create(['id' => 16, 'rule' => "SET_APPOINTMENT"]);
        KiState::create(['id' => 17, 'rule' => "OPTIN_LEAD"]);
        KiState::create(['id' => 18, 'rule' => "COLD_MARKET"]);
        KiState::create(['id' => 19, 'rule' => "TEAM_SUPPORT"]);
        KiState::create(['id' => 20, 'rule' => "COMPANY_NAME"]);
        KiState::create(['id' => 21, 'rule' => "AGENT_NAME"]);
        KiState::create(['id' => 22, 'rule' => "THIRD_BASE"]);
        KiState::create(['id' => 23, 'rule' => "INITIAL_BLOCK_COMPLETED"]);
        KiState::create(['id' => 24, 'rule' => "PURCHASE_LINK"]);
        KiState::create(['id' => 25, 'rule' => "WEBSITE_LINK"]);
    }
}
