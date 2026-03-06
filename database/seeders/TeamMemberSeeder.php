<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        $teamMembers = [
            [
                'name' => 'John Doe',
                'image' => 'team/john_doe.jpg', // Place your image in storage/app/public/team/
                'gender' => 'male',
                'role' => 'General Manager',
                'joined_on' => '2020-01-01',
                'bio' => 'John Doe leads the team with extensive experience in management.',
                'status' => 'active',
            ],
            [
                'name' => 'Jane Wanjiku',
                'image' => 'team/jane_wanjiku.jpg',
                'gender' => 'female',
                'role' => 'Head Chef',
                'joined_on' => '2021-06-15',
                'bio' => 'Jane Wanjiku is our expert chef, passionate about culinary excellence.',
                'status' => 'active',
            ],
            [
                'name' => 'Peter Omondi',
                'image' => 'team/peter_omondi.jpg',
                'gender' => 'male',
                'role' => 'Events Coordinator',
                'joined_on' => '2019-09-10',
                'bio' => 'Peter Omondi coordinates all our events with precision and creativity.',
                'status' => 'active',
            ],
            [
                'name' => 'Mary Chebet',
                'image' => 'team/mary_chebet.jpg',
                'gender' => 'female',
                'role' => 'Guest Relations',
                'joined_on' => '2022-03-01',
                'bio' => 'Mary Chebet ensures our guests have an excellent experience.',
                'status' => 'active',
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::create($member);
        }
    }
}
