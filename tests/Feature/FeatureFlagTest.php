<?php

//namespace Tests\Feature;

use App\Models\Facades\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeatureFlagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function test_fake_feature_returns_false()
    {
        $this->assertFalse(Feature::isActive('fake_feature'));
    }


    /**
     * @test
     */
    public function test_active_feature_returns_true()
    {
        $feature = Feature::create([
            'name' => 'test_feature',
            'is_active' => true
        ]);

        $this->assertTrue(Feature::isActive($feature->name));
    }

    /**
     * @test
     */
    public function test_inactive_feature_returns_false()
    {
        $feature = Feature::create([
            'name' => 'test_feature',
            'is_active' => false
        ]);

        $this->assertFalse(Feature::isActive($feature->name));
    }

    public function test_feature_toggle_off()
    {
        $feature = Feature::create([
            'name' => 'test_feature',
            'is_active' => true
        ]);
        $this->assertTrue(Feature::isActive($feature->name));

        Feature::toggleOff($feature->name);

        $this->assertFalse(Feature::isActive($feature->name));

    }

    public function test_feature_toggle_on()
    {
        $feature = Feature::create([
            'name' => 'test_feature',
            'is_active' => false
        ]);
        $this->assertFalse(Feature::isActive($feature->name));

        Feature::toggleOn($feature->name);

        $this->assertTrue(Feature::isActive($feature->name));

    }
}
