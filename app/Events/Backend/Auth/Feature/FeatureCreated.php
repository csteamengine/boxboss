<?php

namespace App\Events\Backend\Auth\Feature;

use Illuminate\Queue\SerializesModels;

/**
 * Class BoxCreated.
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
