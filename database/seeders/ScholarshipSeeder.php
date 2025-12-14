<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use Carbon\Carbon;


class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scholarship::insert([
        [
            'title' => 'Dean’s Lister Scholarship',
            'description' => 'For consistent dean’s listers.',
            'category' => 'Academic',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(25),
            'status' => 'active',
        ],
        [
            'title' => 'Honor Student Grant',
            'description' => 'Awarded to honor graduates.',
            'category' => 'Academic',
            'award_amount' => 35000,
            'award_description' => '₱35,000 per year',
            'deadline' => Carbon::now()->addDays(20),
            'status' => 'ending_soon',
        ],
        [
            'title' => 'Leadership Excellence Award',
            'description' => 'For student leaders with strong academics.',
            'category' => 'Academic',
            'award_amount' => 45000,
            'award_description' => '₱45,000 per year',
            'deadline' => Carbon::now()->addDays(28),
            'status' => 'active',
        ],
        [
            'title' => 'Merit-Based Scholarship',
            'description' => 'Based on academic merit.',
            'category' => 'Academic',
            'award_amount' => 30000,
            'award_description' => '₱30,000 per year',
            'deadline' => Carbon::now()->addDays(18),
            'status' => 'ending_soon',
        ],

        [
            'title' => 'Needs-Based Educational Aid',
            'description' => 'For students in financial hardship.',
            'category' => 'Financial',
            'award_amount' => 25000,
            'award_description' => '₱25,000 per year',
            'deadline' => Carbon::now()->addDays(12),
            'status' => 'ending_soon',
        ],
        [
            'title' => 'Government Tuition Grant',
            'description' => 'Government-funded tuition support.',
            'category' => 'Financial',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(40),
            'status' => 'active',
        ],
        [
            'title' => 'Community Support Scholarship',
            'description' => 'Sponsored by local community partners.',
            'category' => 'Financial',
            'award_amount' => 20000,
            'award_description' => '₱20,000 per year',
            'deadline' => Carbon::now()->addDays(22),
            'status' => 'active',
        ],

        [
            'title' => 'Athletic Excellence Scholarship',
            'description' => 'For outstanding student athletes.',
            'category' => 'Sports',
            'award_amount' => 45000,
            'award_description' => '₱45,000 per year',
            'deadline' => Carbon::now()->addDays(30),
            'status' => 'active',
        ],
        [
            'title' => 'Varsity Player Grant',
            'description' => 'For official varsity players.',
            'category' => 'Sports',
            'award_amount' => 30000,
            'award_description' => '₱30,000 per year',
            'deadline' => Carbon::now()->addDays(18),
            'status' => 'ending_soon',
        ],
        [
            'title' => 'Regional Athlete Scholarship',
            'description' => 'For regional-level athletes.',
            'category' => 'Sports',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(20),
            'status' => 'ending_soon',
        ],

        [
            'title' => 'STEM Innovation Grant',
            'description' => 'Supports innovative STEM students.',
            'category' => 'STEM',
            'award_amount' => 50000,
            'award_description' => '₱50,000 per year',
            'deadline' => Carbon::now()->addDays(40),
            'status' => 'active',
        ],
        [
            'title' => 'Engineering Excellence Scholarship',
            'description' => 'For engineering students.',
            'category' => 'STEM',
            'award_amount' => 45000,
            'award_description' => '₱45,000 per year',
            'deadline' => Carbon::now()->addDays(35),
            'status' => 'active',
        ],
        [
            'title' => 'IT Future Leaders Grant',
            'description' => 'For IT and Computer Science students.',
            'category' => 'STEM',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(30),
            'status' => 'active',
        ],

        [
            'title' => 'PWD Scholarship',
            'description' => 'For students with disabilities.',
            'category' => 'Special',
            'award_amount' => 30000,
            'award_description' => '₱30,000 per year',
            'deadline' => Carbon::now()->addDays(50),
            'status' => 'active',
        ],
        [
            'title' => 'Indigenous Peoples Grant',
            'description' => 'For indigenous students.',
            'category' => 'Special',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(60),
            'status' => 'active',
        ],
        [
            'title' => 'Solo Parent Assistance',
            'description' => 'For children of solo parents.',
            'category' => 'Special',
            'award_amount' => 25000,
            'award_description' => '₱25,000 per year',
            'deadline' => Carbon::now()->addDays(22),
            'status' => 'active',
        ],

        [
            'title' => 'Arts Talent Scholarship',
            'description' => 'For talented artists and performers.',
            'category' => 'Arts',
            'award_amount' => 35000,
            'award_description' => '₱35,000 per year',
            'deadline' => Carbon::now()->addDays(28),
            'status' => 'active',
        ],
        [
            'title' => 'Music Excellence Grant',
            'description' => 'For musically gifted students.',
            'category' => 'Arts',
            'award_amount' => 40000,
            'award_description' => '₱40,000 per year',
            'deadline' => Carbon::now()->addDays(24),
            'status' => 'active',
        ],
        [
            'title' => 'Creative Writing Scholarship',
            'description' => 'For students excelling in writing.',
            'category' => 'Arts',
            'award_amount' => 25000,
            'award_description' => '₱25,000 per year',
            'deadline' => Carbon::now()->addDays(18),
            'status' => 'ending_soon',
        ],

    ]);

    }
}
