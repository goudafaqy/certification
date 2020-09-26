@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'notify-list'])

<style>

.notification-content {
    width: 100%; }
    .notification-content ul {
      width: 100%;
      list-style: none; }
      .notification-content ul > li {
        margin-bottom: 10px;
        padding: 5px; }
        .notification-content ul > li h4 {
          text-align: inherit !important;
          color: #00628b;
          font-size: 18px;
          font-weight :500; }
          .notification-content ul > li p {
          text-align: inherit !important;
          color: #00628b;
          font-size: 16px;
          font-weight :100;
           }
        .notification-content ul > li span {
          color: #777; }
      .notification-content ul > li:not(:last-child) {
        border-bottom: 1px solid #ccc; }
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">

                            <h3 class="widget-title">الاشعارات</h3>
                              
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

                                    <div class="dashboard-content">
                               
                                        <div class="row">
                                            <div class="notification-content">
                                                <ul class="notification-list">
                                                    @if(count($notifications)> 0)
                                                    @foreach($notifications as $notification )
                                                    <li class="notification-item">
                                                        <h4>{{$notification['title']}}</h4>
                                                        <p> {{$notification['message']}}  </p>
                                                        <span class="notification-time">{{$notification['date']}}</span>
                                                    </li>
                                                    @endforeach
                                                    @else
                                                    <p> ليس لديك أي أشعارات </p>
                                                    @endif
                                                    
                                                </ul>
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
    </div>
</div>
@include('cp.common.dashboard-footer')

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('#dtBasicExample').DataTable({
            "searching": false ,
            "language": {
                "lengthMenu": "عرض _MENU_ تصنيف في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مواد",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_ تصنيفات)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
    })

    $(document).on('click', 'a#delete', function(e) {
        e.preventDefault(); 
        Swal.fire({
        title: 'هل أنت متأكد ؟',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.value) {
                window.location = $(this).attr('href');
            }
        })
    });
</script>
