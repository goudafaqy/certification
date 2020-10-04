<!DOCTYPE html>
<html>

<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
</style>

<head>
<title>مركز التدريب العدلى</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light ">
        <div class="card-header" style="text-align:center">
        تسجيل دخول 
        </div>
        <div class="card-body">
            @if (\Session::has('error'))
                    <div class="alert alert-danger" style="text-align:center">
                        {!! \Session::get('error') !!}
                    </div>
            @endif
            <form action="{{ route('Dologin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="national_id" required class="form-control" style="direction:rtl;float:right;width:20%">
                <br><br><br>
                <button class="btn btn-success " style="text-align:center;float:right;width:20%" >دخول</button>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>