
@include('cp.common.dashboard-header', ['role' => 2])
<div class="main-content">
    <div class="container-fluid">
        <div class="box box-default">
            <div class="wrapper-box">
                <div class="profile-card active">
                    <div class="profile-card-body">
                       <iframe width="900px" height="900px" src="{{$MeetingURL}}"></iframe>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
