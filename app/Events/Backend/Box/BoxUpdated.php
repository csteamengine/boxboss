<?php

namespace App\Events\Backend\Box;

use Illuminate\Queue\SerializesModels;

/**
 * Class BoxUpdated.
 */
class BoxUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $box;

    /**
     * @param $box
     */
    public function __construct($box)
    {
        $this->box = $box;
    }
}
