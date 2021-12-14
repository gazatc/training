<?php

namespace Tests\Feature;

use App\Application;
use App\Job;
use App\JobSeeker;
use App\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class JobSeekerTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function not_verified_job_seeker_cant_apply_for_job()
    {
        $this->withoutExceptionHandling();

        $jobSeeker = factory(JobSeeker::class)->create(['verified' => 0]);
        $this->actingAs($jobSeeker, 'jobSeeker');

        $job = factory(Job::class)->create();

        $this->post(route('job.apply', $job))
            ->assertSessionHas('field', 'الرجاء توثيق الحساب حتى تتمكن للتقدم الى الوظائف');

    }
    /** @test **/
    public function verified_job_seeker_can_apply_for_job()
    {
        $this->withoutExceptionHandling();

        $jobSeeker = factory(JobSeeker::class)->create(['verified' => 1]);
        $this->actingAs($jobSeeker, 'jobSeeker');

        $job = factory(Job::class)->create();

        $count = Application::jobs()->where('job_seeker_id', $jobSeeker->id)->count();

        $this->post(route('job.apply', $job))
            ->assertSessionHas('success', 'تم التقديم بنجاح');

        $this->assertEquals(Application::jobs()->where('job_seeker_id', $jobSeeker->id)->count(), ++$count);
    }

    /** @test **/
    public function not_verified_employer_cant_create_training()
    {
        $this->withoutExceptionHandling();

        $jobSeeker = factory(JobSeeker::class)->create(['verified' => 0]);
        $this->actingAs($jobSeeker, 'jobSeeker');

        $training = factory(Training::class)->create();

        $this->post(route('training.apply', $training))
            ->assertSessionHas('field', 'الرجاء توثيق الحساب حتى تتمكن للتقدم الى التدريب');

    }
    /** @test **/
    public function verified_employer_can_create_training()
    {
        $this->withoutExceptionHandling();

        $jobSeeker = factory(JobSeeker::class)->create(['verified' => 1]);
        $this->actingAs($jobSeeker, 'jobSeeker');

        $training = factory(Training::class)->create();

        $count = Application::trainings()->where('job_seeker_id', $jobSeeker->id)->count();

        $this->post(route('training.apply', $training))
            ->assertSessionHas('success', 'تم التقديم بنجاح');

        $this->assertEquals(Application::trainings()->where('job_seeker_id', $jobSeeker->id)->count(), ++$count);
    }
}
