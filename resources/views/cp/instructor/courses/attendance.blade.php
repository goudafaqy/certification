@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'users-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة الحضور</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 table-container">
                                    @if (session('added'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('added') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('deleted'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('deleted') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('updated'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('updated') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
            <table class="table" width="100%" >
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">وقت الدخول</th>
                        <th class="text-center">وقت المغادرة</th>
                        <th class="text-center">المدة الزمنية</th>
                        <th class="text-center">حاضر/غائب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                    <tr >
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $attendance->user->name_ar }}</td>
                        <td class="priority text-center">{{ $attendance->join_time }}</td>
                        <td class="priority text-center">{{ $attendance->leave_time }}</td>
                        <td class="priority text-center">{{ round(floatval($attendance->duration)/60) }}</td>
                        <td class="priority text-center">
{{--                            <div class="custom-control custom-switch">--}}
{{--                                <input type="checkbox" userId="{{$attendance->user->id}}" class="custom-control-input" id="attend-{{$attendance->id}}">--}}
{{--                                <label class="custom-control-label" for="attend-{{$attendance->id}}">Toggle this switch element</label>--}}

{{--                            </div>--}}

                            <div class="content-switch">
                                <label class="switch">
                                    <input {{$attendance->attend == 1 ? "checked" : ""}}  type="checkbox"  webinarId="{{$attendance->webinar_id}}" userId="{{$attendance->user_id}}" id="attend-{{$attendance->id}}">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')

<script>
    $(document).ready(function() {
    $("input[id^='attend-']").on('change',function () {
        console.log(this.checked)
        var attend = 0;
        if (this.checked) {
             attend = 1;
        }
        $.ajax({
            type: "GET",
            url: "{{url('api/webinar/attend-status')}}"+'/'+$(this).attr('webinarId')+'/'+$(this).attr('userId'),
            data: {attend: attend},
            cache: false,
            success: function(data){
                console.log(data)
            }
        });
    });
    });
</script>
