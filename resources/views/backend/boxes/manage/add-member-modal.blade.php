<!-- Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Invite New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ html()->form('POST', route('admin.boxes.invites.sendMemberInvite', $box))->class('form-horizontal')->id('addMemberForm')->open() }}
                @csrf
{{--                TODO membership type/duration/comped?--}}
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
                {{ html()->form()->close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="addMemberForm">Invite User</button>
            </div>
        </div>
    </div>
</div>
