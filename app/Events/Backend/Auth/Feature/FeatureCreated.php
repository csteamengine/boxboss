<?php

namespace App\Events\Backend\Auth\Feature;

use Illuminate\Queue\SerializesModels;

/**
 * Class FeatureCreated.
 */
class FeatureCreated
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
