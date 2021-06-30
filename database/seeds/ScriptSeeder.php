<?php

use Illuminate\Database\Seeder;
use App\Script;

class ScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // RECENTLY_MET
        Script::create([
            'id' => 1,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, we recently met and talked about {CONTACT_INTEREST}. May I forward you some educational videos?'
        ]);

        // RECENTLY_MET
        Script::create([
            'id' => 2,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, we recently talked over the phone about {CONTACT_INTEREST}. May I forward you some educational videos?'
        ]);

        // RECENTLY_MET
        Script::create([
            'id' => 3,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, and I know we have been talking about {CONTACT_INTEREST}. May I forward you some educational videos?'
        ]);

        // REFERRAL
        Script::create([
            'id' => 4,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, you were referred to me by {REFERRAL_NAME} because of your interest in learning more about {CONTACT_INTEREST}. May I forward you some educational videos?'
        ]);

        // REFERRAL
        Script::create([
            'id' => 5,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, {REFERRAL_NAME} connected us because of your interest in learning more about {CONTACT_INTEREST}. May I forward you some educational videos?'
        ]);

        // PERMISSION_NO
        Script::create([
            'id' => 6,
            'template' => 'Hi, I was wondering if you were able to read my previous text.'
        ]);

        // PERMISSION_NO
        Script::create([
            'id' => 7,
            'template' => 'Hi, were you still interested in learning about the water?'
        ]);

        // EDUCATIONAL_VIDEO + 1
        Script::create([
            'id' => 8,
            'template' => '{LINK} Above is the link to the software-demand.com water videos.'
        ]);

        // EDUCATIONAL_VIDEO + 1
        Script::create([
            'id' => 9,
            'template' => '{LINK} Above is the link to the info on the water.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 10,
            'template' => '{LINK} Above is the link to the videos.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 11,
            'template' => '{LINK} Check out the videos.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 12,
            'template' => '{LINK} Above is the link.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 13,
            'template' => '{LINK} Above is the link to the videos.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 14,
            'template' => '{LINK} Above is the link to the software-demand.com water videos.'
        ]);

        // EDUCATIONAL_VIDEO
        Script::create([
            'id' => 15,
            'template' => '{LINK} Above is the link to the software-demand.com water videos. They are very educational.'
        ]);

        // ARTICLE
        Script::create([
            'id' => 16,
            'template' => '{LINK} Above is an article link on the benefits of hydrogen water. It’s an emerging trend that is getting a lot of attention these days. software-demand.com water company makes a really great product in that industry, something definitely worth looking into.'
        ]);

        // ARTICLE
        Script::create([
            'id' => 17,
            'template' => '{LINK} Read this article on hydrogen water. There is a solid company that manufactures a very good hydrogen water product and personally know them well.'
        ]);

        // ARTICLE
        Script::create([
            'id' => 18,
            'template' => '{LINK} Above is the link to the articles.'
        ]);

        // ARTICLE
        Script::create([
            'id' => 19,
            'template' => '{LINK} Check out the articles.'
        ]);

        // ARTICLE
        Script::create([
            'id' => 20,
            'template' => '{LINK} Here is the link.'
        ]);

        // BOOKLET
        Script::create([
            'id' => 21,
            'template' => '{LINK} Above is the link to the software-demand.com booklet which is full of great information!'
        ]);

        // BOOKLET
        Script::create([
            'id' => 22,
            'template' => '{LINK} Read the software-demand.com booklet, it has really good information.'
        ]);

        // BOOKLET
        Script::create([
            'id' => 23,
            'template' => '{LINK} Above is the link to the software-demand.com booklet.'
        ]);

        // BOOKLET
        Script::create([
            'id' => 24,
            'template' => '{LINK} Check out the software-demand.com booklet.'
        ]);

        // BOOKLET
        Script::create([
            'id' => 25,
            'template' => '{LINK} Above is the link.'
        ]);

        // PURCHASE VIDEO
        Script::create([
            'id' => 26,
            'template' => '{LINK} Above is the purchase link. There are additional videos at the bottom of the page and a great FAQ section.'
        ]);

        // GROUP_CHAT/READY_TO_BUY_YES
        Script::create([
            'id' => 27,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I would like to introduce {SALES_SUPPORT_FIRST_NAME} who is helping me connect people that are interested in software-demand.com water. {SALES_SUPPORT_FIRST_NAME}, {CONTACT_FIRST_NAME} is interested in getting a water system. I will let you both connect and work out the details.'
        ]);

        // GROUP_CHAT/READY_TO_BUY_NO
        Script::create([
            'id' => 28,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I would like to introduce {SALES_SUPPORT_FIRST_NAME} who is helping me educate people that are interested in software-demand.com water. {SALES_SUPPORT_FIRST_NAME}, {CONTACT_FIRST_NAME} is interested in learning more. I will let you both connect and work out the details.'
        ]);

        // Video Touch Category
        Script::create([
            'id' => 29,
            'template' => '{LINK} Above is the video link to {VIDEO_TITLE}'
        ]);

        // Article Touch Category
        Script::create([
            'id' => 30,
            'template' => '{LINK} Above is an article on {ARTICLE_TITLE}.'
        ]);

        // Booklet Touch Category
        Script::create([
            'id' => 31,
            'template' => '{LINK} Above is a link to software-demand.com Booklet'
        ]);

        // Testimonial Video Touch Category
        Script::create([
            'id' => 32,
            'template' => '{LINK} Above is the link to all the testimonial videos'
        ]);

        // HANDED_OFF/GROUP_CHAT/READY_TO_BUY_YES
        // HANDED_OFF/APPOINTMENT/READY_TO_BUY_YES
        Script::create([
            'id' => 33,
            'template' => 'Great! Thank you {REFERRAL_BY_FIRST_NAME} for connecting us. {CONTACT_FIRST_NAME}, please let me know when you are available to schedule a time to chat.'
        ]);

        // HANDED_OFF/GROUP_CHAT/READY_TO_BUY_NO
        // HANDED_OFF/APPOINTMENT/READY_TO_BUY_NO
        Script::create([
            'id' => 34,
            'template' => 'Great! Thank you {REFERRAL_BY_FIRST_NAME} for connecting us. {CONTACT_FIRST_NAME}, I have some great educational videos to start with, let me know if I may send them your way.'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_YES
        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_YES
        Script::create([
            'id' => 35,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I am {USER_FIRST_NAME}, {REFERRAL_BY_FIRST_NAME} reached out to me to contact you because of your interest in getting a software-demand.com water system. Please let me know your availability  and we can set a time to chat.'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Script::create([
            'id' => 36,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I am {USER_FIRST_NAME}, {REFERRAL_BY_FIRST_NAME} reached out to me to contact you due to your interest in learning more about software-demand.com water. May I send you some educational videos?'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        Script::create([
            'id' => 37,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, a support member of software-demand.com. {REFERRAL_BY_COMPANY_NAME} notified me that you were reviewing our information. Let me know if you have any questions and I will reconnect with you later.'
        ]);

        // HANDED_OFF/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        // HANDED_OFF/TEAM_SUPPORT/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Script::create([
            'id' => 38,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I\'m {USER_FIRST_NAME}, a support member of software-demand.com. {REFERRAL_BY_FIRST_NAME} notified me that you were reviewing our information. Let me know if you have any questions and I will reconnect with you later.'
        ]);

        // OPTIN_LEAD
        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/COMPANY_NAME
        // HANDED_OFF/COLD_MARKET/DIRECT_HANDOFF/READY_TO_BUY_NO/AGENT_NAME
        Script::create([
            'id' => 39,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I am {USER_FIRST_NAME} a software-demand.com water agent. Thanks for checking us out, let me know if you have any further questions and I will be happy to assist. Otherwise I will connect back with you later.'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/GROUP_CHAT/READY_TO_BUY_YES
        // HANDED_OFF/TEAM_SUPPORT/APPOINTMENT/READY_TO_BUY_YES
        Script::create([
            'id' => 40,
            'template' => 'Great! Thank you {REFERRAL_BY_FIRST_NAME} for connecting us. {CONTACT_FIRST_NAME}, please let me know your available schedule so we can set a time to chat.'
        ]);

        // HANDED_OFF/TEAM_SUPPORT/GROUP_CHAT/READY_TO_BUY_NO
        // HANDED_OFF/TEAM_SUPPORT/APPOINTMENT/READY_TO_BUY_NO
        Script::create([
            'id' => 41,
            'template' => 'Great! Thank you {REFERRAL_BY_FIRST_NAME} for connecting us. {CONTACT_FIRST_NAME}, please let me know your availability and we can set a time to chat.'
        ]);

        // PURCHASE_LINK
        Script::create([
            'id' => 42,
            'template' => '{LINK} Here is the link to purchase options.'
        ]);

        // AFFILIATE_LINK
        Script::create([
            'id' => 43,
            'template' => '{LINK} Here is the link to affiliate sign up page'
        ]);

        // SET_APPOINTMENT
        Script::create([
            'id' => 44,
            'template' => 'I have scheduled an appointment with {SALES_SUPPORT_FIRST_NAME} on {APT_DATETIME}'
        ]);

        // THIRD_BASE/GROUP_CHAT/READY_TO_BUY_YES
        Script::create([
            'id' => 45,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I have connected you to {SALES_SUPPORT_FIRST_NAME}, who very experienced with the water. {SALES_SUPPORT_FIRST_NAME}, {CONTACT_FIRST_NAME} is interested in getting a water system and may have a few more questions. Please connect and follow up.'
        ]);

        // THIRD_BASE/GROUP_CHAT/READY_TO_BUY_NO
        Script::create([
            'id' => 46,
            'template' => 'Hi {CONTACT_FIRST_NAME}, I have connected you to {SALES_SUPPORT_FIRST_NAME}, who is very experienced with the water. {SALES_SUPPORT_FIRST_NAME}, {CONTACT_FIRST_NAME} may have a few more questions regarding the water, so I will let you follow up. '
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Script::create([
            'id' => 47,
            'template' => '{LINK} Check this article out on {CONTACT_INTEREST}!'
        ]);

        // INITIAL_BLOCK_COMPLETED/ARTICLE
        Script::create([
            'id' => 48,
            'template' => '{LINK} This article is on {CONTACT_INTEREST}, I think you will really like it!'
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Script::create([
            'id' => 49,
            'template' => '{LINK} Above is the link to all the videos, there is a lot of good content.'
        ]);

        // INITIAL_BLOCK_COMPLETED/EDUCATIONAL_VIDEO
        Script::create([
            'id' => 50,
            'template' => '{LINK} This link has all the videos and is very informative.'
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Script::create([
            'id' => 51,
            'template' => '{LINK} Watch this testimonial video. There are a lot of good reviews.'
        ]);

        // INITIAL_BLOCK_COMPLETED/TESTIMONIAL_VIDEO
        Script::create([
            'id' => 52,
            'template' => '{LINK} Check this page out with all the reviews and testimonials!'
        ]);

        /*
         * Library of resources
         */

        // Articles
        Script::create([
            'id' => 53,
            'template' => '{LINK} Above is the link on {ARTICLE_TITLE}.'
        ]);

        Script::create([
            'id' => 54,
            'template' => '{LINK} Above is an article link on {ARTICLE_TITLE}.'
        ]);

        Script::create([
            'id' => 55,
            'template' => '{LINK} Above is a link to all the frequently asked questions.'
        ]);

        // WEBSITE_LINK
        Script::create([
            'id' => 56,
            'template' => '{LINK} Here is the link to website.'
        ]);

        // INITIAL_BLOCK_COMPLETED/BOOKLET
        Script::create([
            'id' => 57,
            'template' => '{LINK} Above is the software-demand.com detailed booklet.'
        ]);

        // INITIAL_BLOCK_COMPLETED/BOOKLET
        Script::create([
            'id' => 58,
            'template' => '{LINK} This is a great brochure to read.'
        ]);
    }
}
