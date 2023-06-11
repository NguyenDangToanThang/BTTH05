<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $data = ['Nhạc trữ tình' , 'Nhạc thư giãn' , 'Nhạc nước ngoài' , 'Nhạc Kpop' , 'Nhạc buồn' , ''];
    private $i = 0;
    public function definition(): array
    {
        // $article = Article::all()->where('ma_tloai' , '=' , ++$this->i)->count();
        return [
            //
            'ten_tloai' => $this->data[$this->i++],
            // 'SLBaiViet' => $article
        ];
    }
}
