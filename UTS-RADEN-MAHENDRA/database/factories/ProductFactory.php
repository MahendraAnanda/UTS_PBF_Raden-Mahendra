<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['iPad', 'Mouse', 'SSD'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek iPad
        $ipadBrands = [
            'Apple iPad Pro',
            'Apple iPad Air',
            'Apple iPad Mini',
            'Apple iPad'
        ];

        // Daftar merek mouse
        $mouseBrands = [
            'Logitech',
            'Razer',
            'Microsoft',
            'Corsair',
            'SteelSeries',
            'HP',
            'Dell',
            'Asus',
            'A4Tech',
            'HyperX'
        ];

        // Daftar merek SSD
        $ssdBrands = [
            'Samsung',
            'Western Digital',
            'Kingston',
            'Crucial',
            'Seagate',
            'ADATA',
            'SanDisk',
            'Corsair',
            'Toshiba',
            'Intel'
        ];

        $name = $category == 'iPad'
            ? $this->faker->randomElement($ipadBrands)
            : ($category == 'Mouse'
                ? $this->faker->randomElement($mouseBrands)
                : $this->faker->randomElement($ssdBrands));

        $description = $category == 'iPad'
            ? $this->faker->randomElement([
                'iPad dengan layar Retina yang indah dan performa tinggi.',
                'Desain elegan dan portabel, sempurna untuk segala kebutuhan.',
                'Dilengkapi dengan chip terbaru untuk kinerja maksimal.'
            ])
            : ($category == 'Mouse'
                ? $this->faker->randomElement([
                    'Mouse dengan respons cepat dan presisi tinggi.',
                    'Desain ergonomis yang nyaman untuk penggunaan jangka panjang.',
                    'Dilengkapi dengan lampu RGB yang bisa disesuaikan.'
                ])
                : $this->faker->randomElement([
                    'SSD dengan kecepatan baca/tulis yang luar biasa.',
                    'Penyimpanan cepat dan andal untuk semua kebutuhan data Anda.',
                    'Hemat energi dan memiliki masa pakai yang panjang.'
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(100000, 10000000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'iPad' ? 1 : ($category == 'Mouse' ? 2 : 3),
            'expired_at' => now()->addDays(365),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'raden@gmail.com'])
        ];
    }
}
