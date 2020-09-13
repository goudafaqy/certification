<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>مركز التدريب العدلي | لوحة التحكم</title>
    <link rel='icon' href="{{ asset('images/favicon.ico') }}" type='image/x-icon'/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icon-kit/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/theme-dashboard.css') }}">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/new-style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- End Style -->
</head>

<body>
<div class="wrapper">
    <header class="header-top" header-theme="">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="top-menu d-flex align-items-center">
                    @if(!isset($role) || $role == 1)
                        <a type="" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></a>
                    @endif
                </div>
                <div class="top-menu d-flex align-items-center">
                    <button type="button" class="nav-link ml-10 right-sidebar-toggle">
                        <i class="far fa-calendar-alt"></i>
                        <span class="badge bg-success">0</span></button>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" data-toggle="dropdown">
                            <?php
                            $notifications = \App\Models\Notification::where('is_read', 0)->where('user_id', Auth::user()->id)->get();
                            ?>
                            <i class="ik ik-bell"></i><span class="badge bg-danger">{{count($notifications)}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                            <h4 class="header">الإشعارات</h4>
                            <div class="notifications-wrap">
                                @foreach($notifications as $notification)
                                    <a href="#" class="media">
                                        <span class="d-flex"><i class="ik ik-check"></i> </span>
                                        <span class="media-body">
                                            <span
                                                class="heading-font-family media-heading">{{$notification->title_ar}}</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <div class="footer"><a href="">كل الإشعارات</a></div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle pub-ser" href="#" id="userDropdown" data-toggle="dropdown">
                            <i class="ik ik-chevron-down"></i>
                            <img class="avatar" src="{{ Auth::user()->image?url(Auth::user()->image): "#" }}" alt="">
                            <span style="font-size: 11px; line-height: 4.6;">{{ Auth::user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('edit-profile') }}">الملف الشخصي <i
                                    class="ik ik-user dropdown-icon"></i> </a>
                            <a class="dropdown-item" href="/password/reset">تغيير كلمة المرور <i
                                    class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                            <a class="dropdown-item" href=""
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل
                                خروج <i class="ik ik-power dropdown-icon"></i> </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrap">
        <div class="app-sidebar colored">
            <div class="sidebar-header">
                <a id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></a>
                <a class="header-brand" href="{{ url('/') }}">
                    <div class="logo-img">
                        <img src="{{ asset('images/new-logo.png') }}" class="header-brand-img" alt="jtc">
                    </div>
                </a>
            </div>
            <div class="sidebar-content">
                <div class="nav-container">
                    <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-item">
                            <a href="{{ route('dashboard') }}"><img src="{{ asset('images/home.png') }}"
                                                                    style="width: 22px">
                                <span> الصفحة الرئيسية </span>
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="nav-container">
                    <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-item">
                            <a href="{{ route('dashboard') }}"><img src="{{ asset('images/home.png') }}"
                                                                    style="width: 22px">
                                <span>  الصفحة الرئيسية</span>
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="nav-container">
                    <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-item">
                            <a href="{{ route('trainee-courses') }}"><img src="{{ asset('images/current.png') }}"
                                                                          style="width: 22px">
                                <span>  الدورات التدريبية</span>
                            </a>
                        </div>
                    </nav>
                </div>


            </div>
        </div>


        <div id="panichd_content" class="container-fluid">
            <div class="main-content">
                @yield('panichd_errors')
                @yield('content')
            </div>
        </div>


        <footer class="footer" style="text-align: center; color:#fff">
            <div class="w-100 clearfix">
                <span class="text-center;"> جميع الحقوق محفوظة © مركز التدريب العدلي 1441هـ | 2020 م </span>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/jquery.simple-calendar.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>

    $('.repeater-default').repeater({
        show: function () {
            $(this).slideDown();
        }

    });

</script>
<script>
    $(document).ready(function () {

        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: false,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'text-input': 'foo'
            },
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            show: function () {
                $(this).slideDown();
            },
            // (Optional)
            // "hide" is called when a user clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                // if(confirm('Are you sure you want to delete this element?')) {
                //     $(this).slideUp(deleteElement);
                // }
            },
            // (Optional)
            // You can use this if you need to manually re-index the list
            // for example if you are using a drag and drop library to reorder
            // list items.
            ready: function (setIndexes) {
            },
            // (Optional)
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: true
        })
    });


</script>
<script>
    $('#chooseFile').bind('change', function () {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

</script>

<script>
    $(document).ready(function () {

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function (e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function () {
            $(this).parent().children('li.star').each(function (e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "شكرا! لقد اختارت " + ratingValue + " نجمة.";
            } else {
                msg = "شكرا! لقد اختارت " + ratingValue + " نجمة.";
            }
            responseMessage(msg);

        });


    });


    function responseMessage(msg)
    {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }
</script>


@yield('footer')

</body>

</html>



