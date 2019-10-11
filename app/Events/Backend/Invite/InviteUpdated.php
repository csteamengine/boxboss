<?php

namespace App\Events\Backend\Invite;

use Illuminate\Queue\SerializesModels;

/**
 * Class BoxUpdated.
 */
class InviteUpdated
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
