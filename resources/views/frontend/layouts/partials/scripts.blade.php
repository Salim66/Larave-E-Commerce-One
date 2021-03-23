
<script src="{{ asset('frontend/assets/vendor/') }}/animsition/js/animsition.min.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/bootstrap/js/popper.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('backend/assets/plugins/') }}/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/jquery-validation/additional-methods.min.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<script>
    $(function () {
        $('#login-form').validate({
            rules: {
                name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                },
                code: {
                    required: true,
                },
                //change password
                current_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                },
                //Product Propertis
                category_id:{
                    required: true
                },
                brand_id:{
                    required: true
                },
                short_desc:{
                    required: true
                },
                long_desc:{
                    required: true
                },
                price:{
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Please enter a name",
                },
                mobile: {
                    required: "Please enter a mobile number",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password",
                    equalTo: "Confirm password do not match!"
                },
                code: {
                    required: "Please enter verification code",
                },

                //password change user
                current_password: {
                    required: "Please enter your current password",
                },
                new_password: {
                    required: "Please enter new password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    equalTo: "Confirm password do not match!"
                },

                //Product Propertis
                category_id: {
                    required: "Please enter product category"
                },
                brand_id: {
                    required: "Please enter product brand"
                },
                short_desc: {
                    required: "Please enter product short description"
                },
                long_desc: {
                    required: "Please enter product long description"
                },
                price: {
                    required: "Please enter product price"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        });

        $(function(){
            $(document).on('click', '#user_delete', function(e){
                e.preventDefault();
                const link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be delete!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                     })
            });
        });
    });
</script>
<script src="{{ asset('frontend/assets/vendor/') }}/daterangepicker/moment.min.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/slick/slick.min.js"></script>
<script src="{{ asset('frontend/assets/js/') }}/slick-custom.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<script src="{{ asset('frontend/assets/vendor/') }}/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<script src="{{ asset('frontend/assets/vendor/') }}/isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend/assets/vendor/') }}/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

</script>
<script src="{{ asset('frontend/assets/vendor/') }}/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<script src="{{ asset('frontend/assets/js/') }}/main.js"></script>

@if(session()->has('success'))
	<script text="text/javascript">
		$(function(){
			$.notify("{{session()->get('success')}}", {globalPosition: 'top right', className:'success'});
        });
	</script>
@endif
@if(session()->has('error'))
	<script text="text/javascript">
		$(function(){
			$.notify("{{session()->get('error')}}", {globalPosition: 'top right', className:'error'});
        });
	</script>
@endif

{{-- Customer Image --}}
<script>
(function($){
    $(document).ready(function(){
        $(document).on('change', '#customer_image', function(e){
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
           $('#customer_image_load').attr('src', image_url);
        });
    });
})(jQuery);
</script>
