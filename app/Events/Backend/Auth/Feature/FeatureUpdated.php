<?php

namespace App\Events\Backend\Auth\Feature;

use Illuminate\Queue\SerializesModels;

/**
 * Class FeatureUpdated.
 */
class FeatureUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $feature;

    /**
     * @param $feature
     */
    public function __construct($feature)
    {
        $this->feature = $feature;
    }
}
