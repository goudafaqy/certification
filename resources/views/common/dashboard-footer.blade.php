
            <footer class="footer" style="text-align: center; color:#fff">
                <div class="w-100 clearfix">
                    <span class="text-center;"> جميع الحقوق محفوظة © مركز التدريب العدلي 1441هـ | 2020 م </span>
                </div>
            </footer>
            <!-- <aside class="right-sidebar">
                <div class="sidebar-chat" data-plugin="chat-sidebar">
                    <div class="sidebar-chat-info">
                    </div>
                    <div class="event-list">
                        <a href="javascript:void(0)" class="">
                            <h4 class="event">
                                <span class="date"> <i class="far fa-clock"></i> Thursday, 28 Feb</span>
                                <span class="name"> <i class="fas fa-award"></i> اسم الحدث </span>
                                <span class="desc"> <i class="far fa-file-alt"></i> الوصف الحدث وصف </span>
                            </h4>
                        </a>
                        <a href="javascript:void(0)" class="">
                            <h4 class="event">
                                <span class="date"> <i class="far fa-clock"></i> Thursday, 28 Feb</span>
                                <span class="name"> <i class="fas fa-award"></i> اسم الحدث </span>
                                <span class="desc"> <i class="far fa-file-alt"></i> الوصف الحدث وصف </span>
                            </h4>
                        </a>
                        <a href="javascript:void(0)" class="">

                            <h4 class="event">
                                <span class="date"> <i class="far fa-clock"></i> Thursday, 28 Feb</span>
                                <span class="name"> <i class="fas fa-award"></i> اسم الحدث </span>
                                <span class="desc"> <i class="far fa-file-alt"></i> الوصف الحدث وصف </span>
                            </h4>
                        </a>
                    </div>
                </div>
            </aside> -->
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.simple-calendar.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#container").simpleCalendar({
                fixedStartDay: false,
                disableEmptyDetails: true,
                events: [
                    // generate new event after tomorrow for one hour
                    {
                        startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
                        endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
                        summary: 'اسم الحدث 1'
                    },
                    // generate new event for yesterday at noon
                    {
                        startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
                        endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
                        summary: 'اسم الحدث 444'
                    },
                    // generate new event for the last two days
                    {
                        startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
                        endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
                        summary: 'اسم الحدث 22'
                    }
                ],
            });
        });
    </script>
</body>

</html>