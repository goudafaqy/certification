@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'dashboard'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الإحصائيات</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 new-ser">
                                    <span style="color: #A58661">جاري العمل على إضافة بعض الإحصائيات  <i class="fa fa-cogs"></i></span>
                                </div>
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