<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $ten_bhat = [
        'Yêu' , 'Thương' , 'Anh yêu em nhiều lắm' , 'Anh yêu em' , 'Chạy ngay đi',
        'Đường một chiều' , 'Chạy ngay đi' , 'Người hãy quên em đi' , 'Hãy trao cho anh' , 'Buồn của anh' ,
        'Đi để trở về' , 'Nơi này có anh' , 'Sóng gió' , 'Cô gái m52' , 'Hồng Nhan', 
        'Yêu một người không yêu' , 'Em của ngày hôm qua' , 'Thương' , 'Anh nhớ em' , 'Yêu một người vô tâm', ''];
    private $tieude = [
        'Dấu yêu trong tim' , 'Một chút nhớ nhung' , 'Vùng xa lắm' , 'Chạm đến giấc mơ' , 'Đường về quê hương',
        'Hạnh phúc không tên' , 'Giữ lấy niềm tin' , 'Nắm tay nhau đi đến cuối cùng' , 'Ngọt ngào như hoa' , 'Đánh mất điều quan trọng'];
    private $i = 0;
    public function definition(): array
    {
        return [
            //
            'tieude' => $this->tieude[random_int(0,9)],
            'ten_bhat' => $this->ten_bhat[$this->i++],
            'ma_tloai' => Category::all()->random()->ma_tloai,
            'tomtat' => $this->faker->paragraph,
            'noidung' => $this->faker->paragraph,
            'ma_tgia' => Author::all()->random()->ma_tgia,
            'hinhanh' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
