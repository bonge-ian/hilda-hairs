<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Sequence;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedParents();
        $this->seedChildren();
    }

    private function parents()
    {
        return [
            'Hair Extensions' => 'img/hair-ext-cover.jpg',
            'Weaves' => 'img/weave-cover.jpg',
            'Wigs' => 'img/wig-cover.jpg'
        ];
    }

    private function children()
    {
        return [
            'Wigs' => [
                'Clipins' => 'img/clipin-cover.jpg',
                'Frontals' => 'img/frontal-cover.jpg',
                'Laces' => 'img/lace-cover.jpg',
            ]
        ];
    }

    private function seedParents()
    {
        foreach ($this->parents() as $category => $coverImage) {
            Category::factory()
                ->sequence([
                    'name' => $category,
                    'slug' => Str::slug($category),
                    'cover_image_url' => $coverImage,
                    'order' => rand(0, 3)
                ])
                ->create();
        }
    }

    private function seedChildren()
    {
        foreach ($this->children() as $parent => $children) {
            $parentId = Category::where('name', $parent)->select('id')->first();
            foreach ($children as $category => $coverImage) {
                Category::factory()
                    ->sequence(
                        [
                            'name' => $category,
                            'slug' => Str::slug($category),
                            'cover_image_url' => $coverImage,
                            'order' => rand(0, 3),
                            'parent_id' => $parentId
                        ]
                    )
                    ->create();
            }
        }
    }
}
