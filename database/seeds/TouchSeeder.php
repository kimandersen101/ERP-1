<?php
use Illuminate\Database\Seeder;
use App\Touch;

class TouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //recently met, referral, permission no

        // RECENTLY_MET
        Touch::create([
            'script_id' => 1,
            'type' => 'TEXT',
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '7'
        ]);

        // RECENTLY_MET
        Touch::create([
            'script_id' => 2,
            'type' => 'TEXT',
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '7'
        ]);

        // RECENTLY_MET
        Touch::create([
            'script_id' => 3,
            'type' => 'TEXT',
            'title' => 'Script Idea 3',
            'order' => 3,
            'ki_states_rule' => '7'
        ]);

        // REFERRAL
        Touch::create([
            'script_id' => 4,
            'type' => 'TEXT',
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '6'
        ]);

        // REFERRAL
        Touch::create([
            'script_id' => 5,
            'type' => 'TEXT',
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '6'
        ]);

        // PERMISSION_NO
        Touch::create([
            'script_id' => 6,
            'type' => 'TEXT',
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '8'
        ]);

        // PERMISSION_NO
        Touch::create([
            'script_id' => 7,
            'type' => 'TEXT',
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '8'
        ]);

        // EDUCATIONAL_VIDEO+1
        Touch::create([
            'script_id' => 8,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '9',
            'attempt' => 1
        ]);

        // EDUCATIONAL_VIDEO+1
        Touch::create([
            'script_id' => 9,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '9',
            'attempt' => 1
        ]);

        // EDUCATIONAL_VIDEO+2 (overview)
        Touch::create([
            'script_id' => 10,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // EDUCATIONAL_VIDEO+2 (overview)
        Touch::create([
            'script_id' => 11,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // EDUCATIONAL_VIDEO+2 (overview)
        Touch::create([
            'script_id' => 12,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'Script Idea 3',
            'order' => 3,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // EDUCATIONAL_VIDEO+2 (pure)
        Touch::create([
            'script_id' => 13,
            'type' => 'VIDEO',
            'type_id' => 2,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // EDUCATIONAL_VIDEO+2 (pure)
        Touch::create([
            'script_id' => 14,
            'type' => 'VIDEO',
            'type_id' => 2,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // EDUCATIONAL_VIDEO+2 (pure)
        Touch::create([
            'script_id' => 15,
            'type' => 'VIDEO',
            'type_id' => 2,
            'title' => 'Script Idea 3',
            'order' => 3,
            'ki_states_rule' => '9',
            'attempt' => 2
        ]);

        // ARTICLE+1
        Touch::create([
            'script_id' => 16,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '11',
            'attempt' => 1
        ]);

        // ARTICLE+1
        Touch::create([
            'script_id' => 17,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '11',
            'attempt' => 1
        ]);

        // ARTICLE+2
        Touch::create([
            'script_id' => 18,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '11',
            'attempt' => 2
        ]);

        // ARTICLE+2
        Touch::create([
            'script_id' => 19,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '11',
            'attempt' => 2
        ]);

        // ARTICLE+2
        Touch::create([
            'script_id' => 20,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => 'Script Idea 3',
            'order' => 3,
            'ki_states_rule' => '11',
            'attempt' => 2
        ]);

        // BOOKLET+1
        Touch::create([
            'script_id' => 21,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '10',
            'attempt' => 1
        ]);

        // BOOKLET+1
        Touch::create([
            'script_id' => 22,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '10',
            'attempt' => 1
        ]);

        // BOOKLET+2
        Touch::create([
            'script_id' => 23,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '10',
            'attempt' => 2
        ]);

        // BOOKLET+2
        Touch::create([
            'script_id' => 24,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'Script Idea 2',
            'order' => 2,
            'ki_states_rule' => '10',
            'attempt' => 2
        ]);

        // BOOKLET+2
        Touch::create([
            'script_id' => 25,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'Script Idea 3',
            'order' => 3,
            'ki_states_rule' => '10',
            'attempt' => 2
        ]);

        //Purchase
        Touch::create([
            'script_id' => 26,
            'type' => 'VIDEO',
            'type_id' => 10,
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '12',
            'attempt' => 1
        ]);

        // GROUP_CHAT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 27,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '2/3'
        ]);

        // GROUP_CHAT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 28,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '2/4'
        ]);

        /*
         * HANDED_OFF Touches
         */

        // HANDED_OFF/GROUP_CHAT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 33,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/2/3'
        ]);

        // HANDED_OFF/APPOINTMENT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 33,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/15/3'
        ]);

        // HANDED_OFF/GROUP_CHAT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 34,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/2/4'
        ]);

        // HANDED_OFF/APPOINTMENT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 34,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/15/4'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 35,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/1/3'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 35,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/19/1/3'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 36,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/1/4/20'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 36,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/1/4/21'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 36,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/1/4/20'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 36,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/1/4/21'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 37,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/1/4/20'
        ]);

        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 37,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/18/1/4/20'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 37,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/1/4/20'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 38,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/1/4/21'
        ]);

        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 38,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/18/1/4/21'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 38,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/1/4/21'
        ]);

        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Touch::create([
            'script_id' => 39,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/18/1/4/20'
        ]);

        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Touch::create([
            'script_id' => 39,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/18/1/4/21'
        ]);

        // OPTIN_LEAD
        Touch::create([
            'script_id' => 39,
            'type' => 'TEXT',
            'title' => 'Script Idea 1',
            'order' => 1,
            'ki_states_rule' => '17'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/GROUP_CHAT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 40,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/19/2/3'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/APPOINTMENT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 40,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '5/19/15/3'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/GROUP_CHAT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 41,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/2/4'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/APPOINTMENT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 41,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '5/19/15/4'
        ]);

        // PURCHASE_LINK
        Touch::create([
            'script_id' => 42,
            'type' => 'PURCHASE',
            'title' => 'Purchase Link',
            'order' => 1,
            'ki_states_rule' => '24'
        ]);

        // AFFILIATE_LINK
        Touch::create([
            'script_id' => 43,
            'type' => 'AFFILIATE',
            'title' => 'Affiliate Link',
            'order' => 1,
            'ki_states_rule' => '13'
        ]);

        // SET_APPOINTMENT
        Touch::create([
            'script_id' => 44,
            'type' => 'TEXT',
            'title' => 'Appointment Set',
            'order' => 1,
            'ki_states_rule' => '16'
        ]);

        // THIRD_BASE/GROUP_CHAT/READY_TO_BUY_YES
        Touch::create([
            'script_id' => 45,
            'type' => 'TEXT',
            'title' => 'Ready to buy: Yes',
            'order' => 1,
            'ki_states_rule' => '22/2/3'
        ]);

        // THIRD_BASE/GROUP_CHAT/READY_TO_BUY_NO
        Touch::create([
            'script_id' => 46,
            'type' => 'TEXT',
            'title' => 'Ready to buy: No',
            'order' => 1,
            'ki_states_rule' => '22/2/4'
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Touch::create([
            'script_id' => 47,
            'type' => 'ARTICLE',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/11',
            'interest_id' => 1,
            'type_id' => 5
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Touch::create([
            'script_id' => 48,
            'type' => 'ARTICLE',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/11',
            'interest_id' => 1,
            'type_id' => 5
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Touch::create([
            'script_id' => 47,
            'type' => 'ARTICLE',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/11',
            'interest_id' => 2,
            'type_id' => 8
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Touch::create([
            'script_id' => 48,
            'type' => 'ARTICLE',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/11',
            'interest_id' => 2,
            'type_id' => 8
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE (Not Shown in app)
        Touch::create([
            'script_id' => 47,
            'type' => 'ARTICLE',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/11',
            'interest_id' => 3,
            'type_id' => 0
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE (Not Shown in app)
        Touch::create([
            'script_id' => 48,
            'type' => 'ARTICLE',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/11',
            'interest_id' => 3,
            'type_id' => 0
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Touch::create([
            'script_id' => 49,
            'type' => 'VIDEO',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/9',
            'type_id' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Touch::create([
            'script_id' => 50,
            'type' => 'VIDEO',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/9',
            'type_id' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Touch::create([
            'script_id' => 49,
            'type' => 'VIDEO',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/9',
            'type_id' => 2
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Touch::create([
            'script_id' => 50,
            'type' => 'VIDEO',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/9',
            'type_id' => 2
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 51,
            'type' => 'VIDEO',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/14',
            'type_id' => 12,
            'interest_id' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 52,
            'type' => 'VIDEO',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/14',
            'type_id' => 12,
            'interest_id' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 51,
            'type' => 'VIDEO',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/14',
            'type_id' => 13,
            'interest_id' => 2
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 52,
            'type' => 'VIDEO',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/14',
            'type_id' => 13,
            'interest_id' => 2
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 51,
            'type' => 'VIDEO',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/14',
            'type_id' => 15,
            'interest_id' => 3
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Touch::create([
            'script_id' => 52,
            'type' => 'VIDEO',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/14',
            'type_id' => 15,
            'interest_id' => 3
        ]);


        /*
         * Library of resources scripts
         */

        // Educational Videos
        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 1,
            'title' => 'software-demand.com Overview',
            'order' => 1,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 2,
            'title' => 'Pure',
            'order' => 2,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 3,
            'title' => 'Clean',
            'order' => 3,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 4,
            'title' => 'Safe',
            'order' => 4,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 5,
            'title' => 'Life',
            'order' => 5,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 6,
            'title' => 'Hydrogen & Mitochondria',
            'order' => 6,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 7,
            'title' => 'Importance of pH balance',
            'order' => 7,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 8,
            'title' => 'The Value Of Technology',
            'order' => 8,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 9,
            'title' => 'Why we are different',
            'order' => 9,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 10,
            'title' => 'Purchase Options',
            'order' => 10,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 11,
            'title' => 'Filter Maintenance',
            'order' => 11,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 13,
            'title' => 'Business Opportunity',
            'order' => 13,
        ]);

        Touch::create([
            'script_id' => 29,
            'touch_category_id' => 1,
            'type' => 'VIDEO',
            'type_id' => 14,
            'title' => 'Compensation',
            'order' => 14,
        ]);

        // Articles
        Touch::create([
            'script_id' => 55,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 0,
            'title' => 'Frequently Asked Questions',
            'order' => 1,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 2,
            'title' => 'Why we are different (Chronological timeline)',
            'order' => 2,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 3,
            'title' => 'How software-demand.com compares to other water treatment systems',
            'order' => 3,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 4,
            'title' => 'software-demand.com Product Specifications',
            'order' => 4,
        ]);

        Touch::create([
            'script_id' => 54,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 5,
            'title' => '13 Health Benefits of Drinking Hydrogen Water',
            'order' => 5,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 7,
            'title' => 'Company Story',
            'order' => 6,
        ]);

        Touch::create([
            'script_id' => 54,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 8,
            'title' => 'Check water quality by Zip Code',
            'order' => 7,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 9,
            'title' => 'Filter Certification by SGS',
            'order' => 8,
        ]);

        Touch::create([
            'script_id' => 53,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 11,
            'title' => 'Purchase and Financing Options',
            'order' => 9,
        ]);

        Touch::create([
            'script_id' => 53,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 12,
            'title' => 'Filter Maintenance',
            'order' => 10,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 13,
            'title' => 'Water Cost per Gallon',
            'order' => 11,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 14,
            'title' => 'Return Policy and Warranty',
            'order' => 12,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 16,
            'title' => 'What is the average delivery time?',
            'order' => 13,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 17,
            'title' => 'How many boxes will I be receiving?',
            'order' => 14,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 18,
            'title' => 'What are the box dimensions including weight?',
            'order' => 15,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 19,
            'title' => 'Can I request shipment to the local FedEx store for pick up?',
            'order' => 16,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 21,
            'title' => 'What are my installation options?',
            'order' => 17,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 22,
            'title' => 'How safe is it to drill holes through granite, marble, quartz, and or other types of countertops?',
            'order' => 18,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 23,
            'title' => 'How do I know it will fit in my kitchen?',
            'order' => 19,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 24,
            'title' => 'If I rent a property, can I still get this unit installed?',
            'order' => 20,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 25,
            'title' => 'If I\'m moving, is this easy to move?',
            'order' => 21,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 27,
            'title' => 'How do I renew my filters?',
            'order' => 22,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 28,
            'title' => 'What is the warranty on filter renewals?',
            'order' => 23,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 29,
            'title' => 'What is the return policy on filter renewals?',
            'order' => 24,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 30,
            'title' => 'What is the software-demand.com Loyalty Program?',
            'order' => 25,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 31,
            'title' => 'Can someone help switch out my filters?',
            'order' => 26,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 32,
            'title' => 'Can I DIY my filter change?',
            'order' => 27,
        ]);

        Touch::create([
            'script_id' => 30,
            'touch_category_id' => 2,
            'type' => 'ARTICLE',
            'type_id' => 33,
            'title' => 'How to contact customer support',
            'order' => 28,
        ]);

        // Booklets
        Touch::create([
            'script_id' => 31,
            'touch_category_id' => 3,
            'type' => 'BOOKLET',
            'type_id' => 1,
            'title' => 'software-demand.com Booklet',
            'order' => 1,
        ]);

        // Testimonial Videos
        Touch::create([
            'script_id' => 32,
            'touch_category_id' => 4,
            'type' => 'VIDEO',
            'type_id' => 12,
            'title' => 'Dr. Tracy Cook',
            'order' => 1,
        ]);

        Touch::create([
            'script_id' => 32,
            'touch_category_id' => 4,
            'type' => 'VIDEO',
            'type_id' => 14,
            'title' => 'Baram',
            'order' => 2,
        ]);

        Touch::create([
            'script_id' => 32,
            'touch_category_id' => 4,
            'type' => 'VIDEO',
            'type_id' => 16,
            'title' => 'Steve Woodward',
            'order' => 3,
        ]);

        Touch::create([
            'script_id' => 32,
            'touch_category_id' => 4,
            'type' => 'VIDEO',
            'type_id' => 17,
            'title' => 'Dave and Virginia Van Pelt',
            'order' => 4,
        ]);

        // WEBSITE_LINK
        Touch::create([
            'script_id' => 56,
            'type' => 'TEXT',
            'title' => 'Website Link',
            'order' => 1,
            'ki_states_rule' => '25',
            'attempt' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/BOOKLET
        Touch::create([
            'script_id' => 57,
            'type' => 'BOOKLET',
            'title' => 'Script idea 1',
            'order' => 1,
            'ki_states_rule' => '23/10',
            'type_id' => 1
        ]);

        // INITIAL_BLOCK_COMPLETED/BOOKLET
        Touch::create([
            'script_id' => 58,
            'type' => 'BOOKLET',
            'title' => 'Script idea 2',
            'order' => 2,
            'ki_states_rule' => '23/10',
            'type_id' => 1
        ]);
    }
}
