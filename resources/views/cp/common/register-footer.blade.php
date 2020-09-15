</div>


</div>


</div>
</div>

</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    if ($("#registerForm").length > 0) {
        $("#registerForm").validate({
 
            rules: {
                name_ar: {
                    required: true,
                    maxlength: 50
                },
 
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
 
                name_en: {
                    required: true,
                    minlength: 50,
                    maxlength: 500,
                },
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
                    maxlength: "The email name should less than or equal to 50 characters",
                },
 
            },
        })
    } 
 </script>

</body>
</html>
