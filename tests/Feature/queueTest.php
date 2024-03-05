<?php

namespace Tests\Feature;

use App\Jobs\SendSms;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class queueTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_sms_job(): void
    {
        Queue::fake();
        $this->artisan('db:seed');
        SendSms::dispatch();
        Queue::assertPushed(SendSms::class);
    }
}
