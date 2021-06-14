<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            ['name' => 'العلوم الانسانية'],
            ['name' => 'التسويق والمبيعات'],
            ['name' => 'العلاقات العامة والاتصال'],
            ['name' => 'الصحافة والاعلام'],
            ['name' => 'العمليات والدعم اللوجستي'],
            ['name' => 'القانون والمحاماة'],
            ['name' => 'تكنولوجيا المعلومات'],
            ['name' => 'الفندقة والسياحة'],
            ['name' => 'الطب والتمريض والصحة العامة'],
            ['name' => 'تصميم وجرافيك'],
            ['name' => 'اللغات والترجمة'],
            ['name' => 'المحاسبة والعلوم المالية'],
            ['name' => 'الهندسة'],
            ['name' => 'التعليم والتدريب'],
            ['name' => 'الثقافة والفنون'],
            ['name' => 'الإدارة والأعمال'],
            ['name' => 'مجالات متنوعة'],
        ];
        foreach ($categories as $category){
            \App\Category::create($category);
        }
    }
}
