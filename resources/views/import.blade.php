<!DOCTYPE html>
<html>
<head>
<title>مركز التدريب العدلى</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<style>
    label {
        float : right;
    }
    .form-control {
        direction :rtl;
    }
</style>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
    <a class="dropdown-item" href="{{ route('logout') }}" >تسجيل خروج <i class="ik ik-power dropdown-icon"></i> </a>

        <div class="card-header" style="text-align:center">
              حمل بيانات المتدربين 
        </div>
        <div class="card-body">

            @if (\Session::has('success'))
                    <div class="alert alert-success" style="text-align:center">
                        {!! \Session::get('success') !!}
                    </div>
            @endif

            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center" >

                    <div class="col-md-6" >
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="date">التاريخ هجري</label>
                            <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="" required name="date" value="{{$item->date??''}}">
                        </div>
                    </div>

                    <div class="col-md-6" >
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="course">عنوان الدورة</label>
                                <input type="text" class="form-control @error('course') is-invalid @enderror" id="course"  placeholder="" name="course" required value="">
                            </div>
                    </div>        
                </div>

                <div class="row justify-content-center" >

                   <div class="col-md-4" >
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="title_en">ملف  اسماء المتدربيبن </label>
                        <input type="file" name="file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>
                    </div>

                    <div class="col-md-4" >
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="hourse">عدد ساعات الدورة</label>
                        <input type="text" class="form-control @error('hourse') is-invalid @enderror" id="hours"  placeholder="" name="hours" required value="">
                        </div>
                    </div> 
                    
                    <div class="col-md-4" >
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="hourse">مدة الدورة (الايام)</label>
                        <input type="text" class="form-control @error('days') is-invalid @enderror" id="days"  placeholder="" name="days" required value="">
                        </div>
                    </div>     

                  
                </div>

               
                
               
                <button class="btn btn-success" style="text-align:center;float:right" >حمل البيانات</button>
               
            </form>
        </div>
    </div>
</div>
   
</body>
</html>