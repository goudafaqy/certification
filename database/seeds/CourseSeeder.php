<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "title_ar" => "الفئة 1",
            "title_en" => "Category 1",
        ]);

        DB::table('classifications')->insert([
            "title_ar" => "التصنيف 1",
            "title_en" => "Class 1",
            "cat_id" => 1
        ]);

        DB::table('courses')->insert([
            "code" => "YLv9-1",
            "title_ar" => "أساسيات وسائل التواصل الاجتماعي",
            "title_en" => "Course 1",
            "overview" => "ssss ssss s",
            "instructor_id" => 2,
            "class_id" => 1,
            "cat_id" => 1,
            "price" => 100,
            "discount" => 0,
            "type" => "recorded",
            "image" => "uploads/courses/1.png",
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            "pass_unit" => "p",
            "pass_grade" => 60.0,
            "skill_level" => "b",
            "reg_start_date" => "2020-08-27",
            "reg_end_date" => "2020-08-31",
            "seats" => 50,
            "start_date" => "2020-09-01",
            "end_date" => "2020-11-01"
        ]);

        DB::table('courses')->insert([
            "code" => "YLv6-2",
            "title_ar" => "اساسيات التعلم عن بعد",
            "title_en" => "Course 2",
            "overview" => "ssss ssss s",
            "instructor_id" => 2,
            "class_id" => 1,
            "cat_id" => 1,
            "price" => 100,
            "discount" => 0,
            "type" => "recorded",
            "image" => "uploads/courses/1.png",
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            "pass_unit" => "p",
            "pass_grade" => 60.0,
            "skill_level" => "b",
            "reg_start_date" => "2020-08-27",
            "reg_end_date" => "2020-08-31",
            "seats" => 50,
            "start_date" => "2020-09-01",
            "end_date" => "2020-11-01"
        ]);

        DB::table('courses')->insert([
            "code" => "YLv3-3",
            "title_ar" => "اساسيات التعلم عن بعد 2",
            "title_en" => "Course 3",
            "overview" => "ssss ssss s",
            "instructor_id" => 2,
            "class_id" => 1,
            "cat_id" => 1,
            "price" => 100,
            "discount" => 0,
            "type" => "recorded",
            "image" => "uploads/courses/1.png",
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            "pass_unit" => "p",
            "pass_grade" => 60.0,
            "skill_level" => "b",
            "reg_start_date" => "2020-08-27",
            "reg_end_date" => "2020-08-31",
            "seats" => 50,
            "start_date" => "2020-09-01",
            "end_date" => "2020-11-01"
        ]);

        DB::table('courses')->insert([
            "code" => "YLv0-4",
            "title_ar" => "اساسيات التعلم عن بعد 3",
            "title_en" => "Course 4",
            "overview" => "ssss ssss s",
            "instructor_id" => 2,
            "class_id" => 1,
            "cat_id" => 1,
            "price" => 100,
            "discount" => 0,
            "type" => "recorded",
            "image" => "uploads/courses/1.png",
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            "pass_unit" => "p",
            "pass_grade" => 60.0,
            "skill_level" => "b",
            "reg_start_date" => "2020-08-27",
            "reg_end_date" => "2020-08-31",
            "seats" => 50,
            "start_date" => "2020-09-01",
            "end_date" => "2020-11-01"
        ]);
    }
}
