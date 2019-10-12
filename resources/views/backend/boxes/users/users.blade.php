<div class="row mb-1">
    <div class="col-sm-5">
        <h4 class="card-title mb-0">
            @lang('labels.backend.boxes.users')
        </h4>
    </div><!--col-->
    @if(FeatureFlag::isActive('invite_management'))
        <div class="col float-right">
            @include('backend.boxes.manage.box-header-buttons')
        </div><!--col-->
    @endif
</div><!--row-->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#members" role="tab" aria-controls="home" aria-selected="true">Members</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="profile" aria-selected="false">Owners/Admins/Coaches</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#invites" role="tab" aria-controls="contact" aria-selected="false">Active Invites</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#requests" role="tab" aria-controls="contact" aria-selected="false">Membership Requests</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="home-tab">
        <div class="col">
            @include('backend.boxes.users.membersTable', ['members' => $box->members()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col">
            @include('backend.boxes.users.staffTable', ['staff' => $box->staff()])
        </div>
    </div>
    <div class="tab-pane fade" id="invites" role="tabpanel" aria-labelledby="contact-tab">
        <div class="col">
            @include('backend.boxes.users.invitesTable', ['invites' => $box->invites()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="requests" role="tabpanel" aria-labelledby="contact-tab">
        <div class="col">
            @include('backend.boxes.users.requestsTable', ['requests' => $box->requests()->get()])
        </div>
    </div>
</div>
