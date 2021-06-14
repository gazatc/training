<?php

namespace Tests\Feature;

use App\Category;
use App\Employer;
use App\Job;
use App\Region;
use App\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

class EmployerTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function not_verified_employer_cant_create_job() {
        $this->withoutExceptionHandling();

        $employer = factory(Employer::class)->create(['verified' => 0]);
        $this->actingAs($employer, 'employer');

        $attributes = [
            'title' => 'test title',
            'region' => factory(Region::class)->create()->id,
            'category' => factory(Category::class)->create()->id,
            'jobType' => 1,
            'for' => 1,
            'salary_type' => 1,
            'salary_amount' => 100,
            'description' => 'test description',
            'requirement' => 'test requirement',
            'last_date' => Date::now(),
        ];

        $count = Job::count();

        $this->post(route('job.store', $employer), $attributes)
            ->assertSessionHas('failed', 'الرجاء توثيق الحساب حتى تتمكن من اضافة الوظائف');
        $this->assertEquals(Job::count(), $count);
    }
    /** @test **/
    public function verified_employer_can_create_job() {
        $this->withoutExceptionHandling();

        $employer = factory(Employer::class)->create(['verified' => 1]);
        $this->actingAs($employer, 'employer');

        $attributes = [
            'title' => 'test title',
            'region' => factory(Region::class)->create()->id,
            'category' => factory(Category::class)->create()->id,
            'jobType' => 1,
            'for' => 1,
            'salary_type' => 1,
            'salary_amount' => 100,
            'description' => 'test description',
            'requirement' => 'test requirement',
            'last_date' => Date::now(),
        ];

        $count = Job::count();

        $this->post(route('job.store', $employer), $attributes)
            ->assertSessionHas('success','تم إضافة العمل بنجاح');
        $this->assertEquals(Job::count(), ++$count);
    }

    /** @test **/
    public function not_verified_employer_cant_create_training() {
        $this->withoutExceptionHandling();

        $employer = factory(Employer::class)->create(['verified' => 0]);
        $this->actingAs($employer, 'employer');

        $attributes = [
            'title' => 'test title',
            'region' => factory(Region::class)->create()->id,
            'category' => factory(Category::class)->create()->id,
            'description' => 'test description',
            'requirement' => 'test requirement',
            'last_date' => Date::now(),
        ];

        $count = Training::count();

        $this->post(route('training.store', $employer), $attributes)
            ->assertSessionHas('failed', 'الرجاء توثيق الحساب حتى تتمكن من اضافة التدريب');
        $this->assertEquals(Training::count(), $count);
    }
    /** @test **/
    public function verified_employer_can_create_training() {
        $this->withoutExceptionHandling();

        $employer = factory(Employer::class)->create(['verified' => 1]);
        $this->actingAs($employer, 'employer');

        $attributes = [
            'title' => 'test title',
            'region' => factory(Region::class)->create()->id,
            'category' => factory(Category::class)->create()->id,
            'description' => 'test description',
            'requirement' => 'test requirement',
            'last_date' => Date::now(),
        ];

        $count = Training::count();

        $this->post(route('training.store', $employer), $attributes)
            ->assertSessionHas('success', 'تم اضافة التدريب بنجاح');
        $this->assertEquals(Training::count(), ++$count);
    }
}
