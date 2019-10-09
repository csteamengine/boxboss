<?php

//namespace Tests\FeatureFlag;

use App\Models\Facades\FeatureFlag;
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
        $this->assertFalse(FeatureFlag::isActive('fake_feature'));
    }


    /**
     * @test
     */
    public function test_active_feature_returns_true()
    {
        $feature = FeatureFlag::create([
            'name' => 'test_feature',
            'is_active' => true
        ]);

        $this->assertTrue(FeatureFlag::isActive($feature->name));
    }

    /**
     * @test
     */
    public function test_inactive_feature_returns_false()
    {
        $feature = FeatureFlag::create([
            'name' => 'test_feature',
            'is_active' => false
        ]);

        $this->assertFalse(FeatureFlag::isActive($feature->name));
    }

    public function test_feature_toggle_off()
    {
        $feature = FeatureFlag::create([
            'name' => 'test_feature',
            'is_active' => true
        ]);
        $this->assertTrue(FeatureFlag::isActive($feature->name));

        FeatureFlag::toggleOff($feature->name);

        $this->assertFalse(FeatureFlag::isActive($feature->name));

    }

    public function test_feature_toggle_on()
    {
        $feature = FeatureFlag::create([
            'name' => 'test_feature',
            'is_active' => false
        ]);
        $this->assertFalse(FeatureFlag::isActive($feature->name));

        FeatureFlag::toggleOn($feature->name);

        $this->assertTrue(FeatureFlag::isActive($feature->name));

    }

    public function test_admin_user_can_access_inactive_feature(){
        $feature = FeatureFlag::create([
            'name' => 'test_feature',
            'is_active' => false
        ]);
        $this->assertFalse(FeatureFlag::isActive($feature->name));
        $this->loginAsAdmin();
        $this->assertTrue(FeatureFlag::isActive($feature->name));

    }

//    public function test_backend_user_redirected_to_dashboard(){
//        $feature = FeatureFlag::create([
//            'name' => 'test_feature',
//            'is_active' => false
//        ]);
//        $this->assertFalse(FeatureFlag::isActive($feature->name));
//        $this->loginAsCoach();
//        $this->assertTrue(FeatureFlag::isActive($feature->name));
//    }
//
//    public function test_guest_and_regular_user_redirected_to_frontend(){
//
//    }
}
