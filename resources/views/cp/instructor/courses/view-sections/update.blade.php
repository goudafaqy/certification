<div class="outer-container">
    <form id="add-update-form" action="{{ route('instructor-save-update', ['id' => $id, 'type' => $type]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <textarea style="padding: 10px; text-align: right; border: solid 1px #CCC;" class="form-control" id="update" name="content" rows="2" placeholder="قم بكتابة الإعلان للمتدربين هنا"></textarea>
                </div>
            </div>
            <div class="col-md-2">
                <button style="width: 100%; height: 6vh; font-size: 1.3em; margin-top: 3px; padding: 0;" type="submit" class="btn btn-primary">نشر</button>
            </div>
        </div>
    </form>
    @if(count($updates) == 0)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="background-color: #a58661; color: #FFF; border-radius: 5px;">
                    لا يوجد إعلانات
                </div>
            </div>
        </div>
    </div>
    @else
        @foreach($updates as $update)
        <div class="row">
            <div class="col-md-10">
                <!-- <div class="card box-simple">
                    <div class="card-body">
                        <div class="actions" style="float: left; display: inline-block;">
                            <a id="delete" href="{{route('instructor-delete-update', ['id' => $update->id, 'course_id' => $update->course_id, 'type' => $type])}}" style="padding-left: 15px; padding-right: 15px; color: #FFF" class="btn btn-danger">حذف</a>
                        </div>
                        <div class="content text-right" style="float: right; display: inline-block;">
                            {{ $update->content }}
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        {{ $update->created_at }}      
                    </div>
                </div> -->

                <div class="section-slantedcard">
		<div class="content-slantedcard">
			<div style="position: relative">
				<div class="section-slantedcard-card section-slantedcard-bottom"></div>
				<div class="section-slantedcard-card section-slantedcard-top">
					<div class="content-slantedcard-img">
						<img src="{{ asset('images/teaching.png') }}" class="img-fluid" width="40px">
					</div>
					
					<div class="content-slantedcard-text">
                        <p>{{ $update->content }}</p>
                        <div class="actions" style="float: left; display: inline-block;">
                            <a id="delete" href="{{route('instructor-delete-update', ['id' => $update->id, 'course_id' => $update->course_id, 'type' => $type])}}" style="padding-left: 15px; padding-right: 15px; color: #FFF;margin-top: 3px;" class="btn btn-danger">حذف</a>
                        </div>
                        <div class="card-footer text-left">
                        2020-09-20 14:41:07      
                    </div>
                    </div>
                  
				</div>
			</div>
		</div>
	</div>
                
            </div>
        </div>
        @endforeach
    @endif
</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
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