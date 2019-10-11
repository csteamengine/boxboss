<?php

namespace App\Events\Backend\Invite;

use Illuminate\Queue\SerializesModels;

/**
 * Class BoxDeleted.
 */
class InviteDeleted
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
