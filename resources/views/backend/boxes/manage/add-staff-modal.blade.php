<!-- Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStaffModalLabel">Invite New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ html()->form('POST', route('admin.boxes.invites.send', $box))->class('form-horizontal')->id('addStaffForm')->open() }}
                @csrf
                <div class="row">
                    <div class="col">
                        {{ html()->label(__('validation.attributes.backend.boxes.invite.email'))
                            ->class('form-control-label')
                            ->for('email') }}

                        {{ html()->email('email')
                            ->class('form-control')
                            ->required()
                            ->placeholder(__('validation.attributes.backend.boxes.invite.email'))
                            }}
                    </div><!--col-->
                </div>
                <div class="row mt-1">
                    <div class="col">
                        {{ html()->label(__('validation.attributes.backend.boxes.invite.role'))
                            ->class('form-control-label')
                            ->for('role') }}

{{--                        TODO decide whether or not to include member here--}}
                        {{ html()->select('role', array( 'owner' => 'Owner', 'admin' => 'Admin', 'coach' => 'Coach'))
                            ->class('form-control selectpicker')
                            ->required()
                            }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="addStaffForm">Invite User</button>
            </div>
        </div>
    </div>
</div>
