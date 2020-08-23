<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>مركز التدريب العدلي</title>

</head>
<body dir="rtl">
<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="right">
            <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td class="email-masthead">
                        <a class="email-masthead_name">
                            <img style="width:30%"  src="{{url('http://93.112.12.70/public/site-assets/images/logo-green.png')}}" alt="logo"  />
                         </a>
                    </td>
                </tr>
                <!-- Email Body -->
                <tr>
                    <td class="email-body" width="100%">
                        <table class="email-body_inner" align="right" width="570" cellpadding="0" cellspacing="0">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">


                                    <p>   عزيزي  {{$data['name']}} ,  </p>
                                    @if($type == 'instructor_account_notification')
                                    
                                        <p> {{$data['message_ar']}} </p>
                                        <p> {{$data['email']}}  :    <strong>  اسم المستخدم</strong>  </p> 
                                        <p> {{$data['password']}}  : <strong> كلمة السر   </strong> </p> 
                                        <p> <a class="nav-link" href="{{ $data['link'] }} "> تسجيل دخول </a> :  <strong>تسجيل من خلال اللنك</strong> </p> 
                                    @else

                                       <p>   {{$data['message_ar']}} </p>

                                    @if($data['link'] != null )
                                      <p> <a class="nav-link" href="{{ $data['link'] }} "> أضغط هنا </a> </p> 
                                    @endif
                                    
                                    @if($data['extra_text'] != null )
                                      <p> {{ $data['extra_text'] }}  </p> 
                                    @endif
                                    
                                    @endif
                                    <p>مع جزيل الشكر </p>

                                   
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="email-footer" align="right" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-cell">
                                    <p class="sub right">
                                        {!! __('Copyright') !!}
                                        <br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
