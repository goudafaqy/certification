<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> مركز التدريب العدلي</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>


       

    </head>

    <body id="body"> 

       <style>
@font-face {
    font-family: 'AL-Mohanad';
    src: url('{{asset("fonts/ae_AlMohanad.ttf")}}') format('truetype');
    font-weight: normal;
    font-style: normal;
}





  * { font-family: AL-Mohanad !important;}
  body{
    font-family:AL-Mohanad !important;
    margin: 0;
    padding: 0px !important;
    color:#283045;
     width: 100%;
     height:auto;
     transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
     -webkit-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
     -moz-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
     -o-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
      position: relative;

  }

.negrito {
font-weight: 700
}

.center {
text-align: center
}

.quebra_linha{
display: block;
}

.font-40 {
font-size:30px;
}


</style>
<div class="row">
<div class="col-md-12">
    <p class="center">
        <a class="center" href="#">
            <img src="{{asset('site-assets/images/certificate/logo.png') }}" class="img-fluid" width="150" style="margin-top:2rem;">
        </a>
        <span class="font-40  quebra_linha" style="color: #538d51;  font-family:AL-Mohanad">شهادة حضور</span>
        <h4 class="center" style="color: grey;margin-bottom:1.5rem;font-size: 25px; font-family:AL-Mohanad">يشهد مركز التدريب العدلي  بأن هذه الشهادة </h4>
        <h4  class="center" style="color: grey;margin-bottom:1.5rem;font-size: 25px; font-family:AL-Mohanad"> <strong>قد منحت الى {{$data['Trainee_name']}}</strong> </h4>
        <h4  class="center" style="color: grey;margin-bottom:1.5rem;font-size: 25px; font-family:AL-Mohanad"> وذلك لاكماله البرنامج التدريبى  <strong>  {{$data['course_name']}} </strong> </h4>
        <h4  class="center" style="color: grey;margin-bottom:1.5rem;font-size: 22px; font-family:AL-Mohanad"> بتاريخ  <strong>  {{$data['date']}} </strong> </h4>
        <span class="font-40   quebra_linha" style="color: #538d51;  font-family:AL-Mohanad;text-align:center"> <a  href="{{route('print',['national_id'=>$data['n_id'],'course' => $data['id'] ])}}" style="color: #538d51;  font-family:AL-Mohanad;text-align:center" >تحميل الشهادة</a></span>                
    </p>
    </div>
</div>
</body>
</html>
