</div>


</div>


</div>
</div>

</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<script>
    if ($("#registerForm").length > 0) {
        $("#registerForm").validate({
 
            rules: {
                name_ar: {
                    required: true,
                    minlength: 10
                },
 
                email: {
                    required: true,
                    minlength: 10,
                    email: true,
                },
 
                name_en: {
                    required: true,
                    minlength: 10
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 10
                },
                password_confirmation: {
                    required: true,
                    minlength: 10
                },
                national_id: {
                    required: true,
                    minlength: 10
                },
                birth_date: {
                    required: true
                },
                gender: {
                    required: true
                }
            },
            messages: {
 
                name_ar: {
                    required: "الاسم باللغة العربية مطلوب",
                },
                name_en: {
                    required: "الاسم باللغة الانجليزية مطلوب",
                },
                email: {
                    required: "البريد الالكترونى مطلوب",
                    email: "أدخل بريد ألكترونى صحيح",
                    minlength: "ايميل غير صالح",
                },
                birth_date: {
                    required: "تاريخ الميلاد مطلوب",
                },
                national_id: {
                    required: "رقم الهوية الوطنية مطلوب",
                },
                mobile: {
                    required: "رقم الجوال مطلوب",
                },
                password: {
                    required: "كلمة السر مطلوبة",
                },
                password_confirmation: {
                    required: "كلمة السر مطلوبة",
                },
                gender: {
                    required: "الجنس مطلوب",
                }
                
            },
        })
    } 
 </script>

</body>
</html>
