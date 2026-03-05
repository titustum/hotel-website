<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'name' => 'James Kiptoo',
            'role' => 'Guest',
            'message' => 'An amazing experience! The rooms were very comfortable and the hospitality was exceptional. The nyama choma was the best I\'ve had in Elgeyo Marakwet.',
            'rating' => 5,
            'featured' => true
        ]);

        Testimonial::create([
            'name' => 'Sarah Mutai',
            'role' => 'Corporate Guest',
            'message' => 'Perfect place for meetings and conferences. The facilities were modern and the staff were professional.',
            'rating' => 5,
            'featured' => true
        ]);

        Testimonial::create([
            'name' => 'Daniel Ngetich',
            'role' => 'Visitor',
            'message' => 'Chumba Resort has a relaxing atmosphere and fantastic food. The cocktails and fresh juices were incredible.',
            'rating' => 5,
            'featured' => true
        ]);
    }
}
