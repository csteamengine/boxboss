<div class="row mb-1">
    <div class="col-sm-5">
        <h4 class="card-title mb-0">
            @lang('labels.backend.boxes.staff')
        </h4>
    </div><!--col-->
    @if(FeatureFlag::isActive('invite_management'))
        <div class="col float-right">
            @include('backend.boxes.manage.staff-header-buttons')
        </div><!--col-->
    @endif
</div><!--row-->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#owners" role="tab" aria-controls="profile" aria-selected="false">Owners</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admins" role="tab" aria-controls="profile" aria-selected="false">Admins</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#coaches" role="tab" aria-controls="profile" aria-selected="false">Coaches</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#invites" role="tab" aria-controls="contact" aria-selected="false">Active Invites</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="owners" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col">
            @include('backend.boxes.staff.ownersTable', ['owners' => $box->owners()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col">
            @include('backend.boxes.staff.adminsTable', ['admins' => $box->admins()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="coaches" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col">
            @include('backend.boxes.staff.coachesTable', ['coaches' => $box->coaches()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="invites" role="tabpanel" aria-labelledby="contact-tab">
        <div class="col">
            @include('backend.boxes.staff.invitesTable', ['invites' => $box->invites()->get()])
        </div>
    </div>
</div>
