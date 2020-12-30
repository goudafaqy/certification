<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> certificate</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>


       

    </head>
    <body id="body"> 

<style>
    .page{
    page-break-inside: avoid;
    }
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

            .content{
            padding:0rem 3rem 0rem 3rem;
            }
            .content-english h4{
            text-align: left;
            font-family: AL-Mohanad;
            line-height:2.3;
            color:#283045;
            font-size:17px;
            letter-spacing:1px;
            }



            .content h4::after {
                padding: 0 5px;
                color: #aa8661;
                content: "/\00a0";
            }
            .content h4 span{
            margin-right:3rem;
            }
            .content-english h4::before {
                padding: 0 5px;
                color: #aa8661;
                content: "/\00a0";
            }

            .certificado_conteudo img {
                display: table;
                margin: auto;
                height:100%;
                width:100%;
                position: absolute;
            }
            .content-box{
                position: relative;
                z-index:999;
                padding:3rem;
                width:1000px;
                margin:0 auto;
            }





            .box,
            .box a
            {
                display: table;
                
                align-items: center;
                margin: auto;
            }
            .content h4{
                font-family: AL-Mohanad;
                line-height:2.3;
                color:#283045;
                font-size:17px;
            }

            .bottom-text{
                text-align:center;
                padding-bottom:1rem;
            }
            .content-box h6{
                text-align: center;
                font-family: AL-Mohanad !important;
                color:#a58661;
                

                
            }
            .bottom-text span{
                color:#283045;
            
                font-family: AL-Mohanad !important;
                
            }
            .wrap-login .logo-centered{
                text-align: center;
                z-index: 9999;
                width: 260px; 
                margin: 0px auto 30px auto
            }
            .container-login {
                width: 100%;  
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                position: relative;
                z-index: 1;  
            }
            .auth-wrapper .bg2 {
                height: auto;
                position: relative;
                width: 100%;
                -webkit-background-size: cover;
                background-size: cover;
                background-repeat: no-repeat;
                display: flex;
                justify-content: center;
                align-items: center;
                background-position: center center;
            }
            .auth-wrapper .bg2 .overlay {
                position: absolute;
                width: 100%;
                height: auto;
                background: rgba(6, 12, 34, 0.8);
                background: rgb(1,24,42);
                background: radial-gradient(circle, rgba(0,0,0,0.7) 0%, rgba(1, 24, 42,0.8) 54%, rgba(1, 24, 42,1) 99%);
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                opacity: .9;
            }
            /* .box h5::after {
                padding: 0 5px;
                color: #aa8661;
                content: "/\00a0";
            } */
</style>
	
        <div class="auth-wrapper page">
            <div class=" " style="overflow: hidden;">
                <div class="row flex-row h-100">
                    <div class=" col-md-12 p-0 d-md-block d-lg-block">
                        <div class="bg2">
                            <div class="overlay"></div>
                            <div class="col-xl-12 col-lg-12 col-md-12 my-auto" style="margin: auto;display: table;overflow: hidden;">
                            <div class="certificado_conteudo ">
                                <img src="{{asset('site-assets/images/certificate/background.jpg') }}" style="box-shadow: 1px 1px 5px 0px rgba(82, 82, 82, 0.75)">
                            </div>

                           

                            <div class="content-box"  id="result">
                               <br> <br>
                                <div class="row">
                                    
                                    <div class="col-2">
                                    <img src="{{asset('site-assets/images/certificate/elem.png') }}"  class="float-left" width="150">
                                    </div>
                                    <div class="col-7">
                                    <br> 
                                            <h4 class="center" style="color: #bd973b;font-size: 35px;font-weight:600; font-family:AL-Mohanad">شهادة اجتياز</h4>
                                            <h5 class="center"  style="color: #538d51;text-align: center;font-size:16px; font-family:AL-Mohanad">Certification Completiion</h5>
                                    </div>
                                    <div class="col-3">
                                        
                                            <img src="{{asset('site-assets/images/certificate/logo.png') }}" class="img-fluid" width="150">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-5">
                                        <p  style="font-family:arial;text-align:left;font-size:16px;margin-left:17px">
                                            Justice Training Center hereby, certifies that the trainee <br>
                                                                <strong>{{$data['Trainee_name_en']}} </strong><br> 
                                                                ID ({{$data['n_id']}}) has completed <br>
                                                                lawyers training program that qualifies <br>
                                                                for law licensing, held in Justice <br>
                                                                Training Center for {!!$data['duration_en']!!}‭ starting from {!!$data['fromDate_en']!!}‭
                                                                
                                        
                                        </p>
                                    </div>
                                    <div class="col-1">
                                            
                                    </div>
                                    <div class="col-6">
                                    <p  style="font-family:AL-Mohanad;text-align:right;font-size:20px;margin-right:8px">
                                        يشهد مركز التدريب العدلي بأن  {{ (  $data['sex'] == 0  ? "المتدربة" : "المتدرب" ) }}    <br>
                                        <strong> {{$data['Trainee_name']}} </strong> <br>
                                        هوية وطنية رقم ({{$data['national_id']}}) قد {{ (  $data['sex'] == 0  ? "اجتازت" : "اجتاز" ) }}  برنامج <br>
                                        {!!$data['course_name']!!}  
                                            والمقام  بمركز التدريب العدلي  لمدة {{ $data['duration'] }}‭  
                                            <br>
                                            تدريبية من تاريخ  {{ $data['fromDate'] }}
                                    </p>
                                    <img src="{{asset('site-assets/images/certificate/stamp.png') }}" class="img-fluid" width="150" >  
        
                                    </div>

                                </div>
                                <div class="row" style="margin: auto;width:780px; ">
                                    <div class="col-12">
                                        <div  style="text-align: center">
                                            <h3 style="font-family:AL-Mohanad;font-size:25px ">مدير عام مركز التدريب العدلي</h3>
                                            <h3 style="font-family:AL-Mohanad;font-size:20px">Justice Training Center Director</h3>
                                        <br> <br>
                                            <img src="{{asset('site-assets/images/certificate/Signature2.png') }}" class="img-fluid" style="   
                                            margin-top: -65px;
                                            margin-left: -89px;
                                            position: absolute;
                                            width: 230px;"> 
                                            
                                            <h4 style="font-family:AL-Mohanad;font-size:25px">د.فارس بن محمد القرني</h4>
                                            <h4 style="font-family:AL-Mohanad;font-size:20px">Dr. Faris M. Algarni</h4>
                                            <div class="qrcode" style="text-align:left; margin-top:-40px"> {!! QrCode::color(28,97,20)->size(100)->generate(route('verificationCertificate',['national_id'=>$data['n_id'],'course' => $data['id'] ])); !!}</div>

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

    </body>
</html>
