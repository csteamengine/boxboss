<?php

namespace App\Events\Backend\Invite;

use Illuminate\Queue\SerializesModels;

/**
 * Class BoxCreated.
 */
class InviteCreated
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
