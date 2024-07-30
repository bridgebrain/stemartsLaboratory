<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wiki;

class WikiSeeder extends Seeder
{
    public function run()
    {
        Wiki::create([
            'title' => 'Sample Wiki 1',
            'description' => 'This is a sample wiki description.',
            'collection' => 'Sample Collection',
        ]);

        Wiki::create([
            'title' => 'Sample Wiki 2',
            'description' => 'Another sample wiki description.',
        ]);
    }
}