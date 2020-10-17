@include('cp.common.dashboard-header')

</div>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                              <p style="color: #A58661; text-align:center" > أهلا بك فى مركز التدريب العدلى </p>
                            </div>
                        </div>
                        @foreach($courses as $course)
                        <div class="card-body" >
                            <div class="row">
                               
                                  
								  <div class="col-md-6">
                                  <a href="{{route('print',['national_id'=>$national_id,'course' => $course->details->id])}}" style="color: #A58661; text-align:center;font-size:15px" target="_blank"> تحميل شهادة ( {{$course->details->name}} ) </a>
                                 </div>

                            </div>
                        </div>
                        @endforeach

                     
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
@include('cp.common.f')