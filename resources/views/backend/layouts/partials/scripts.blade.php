<!-- jQuery -->
<script src="{{ asset('backend/assets/plugins/') }}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/assets/plugins/') }}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/assets/plugins/') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/assets/plugins/') }}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/assets/plugins/') }}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/assets/plugins/') }}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/assets/plugins/') }}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/assets/plugins/') }}/moment/moment.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/assets/plugins/') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('backend/assets/plugins/') }}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/assets/plugins/') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/assets/dist/') }}/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/assets/dist/') }}/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/assets/dist/') }}/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/assets/plugins/') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/jszip/jszip.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('backend/assets/plugins/') }}/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('backend/assets/plugins/') }}/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('backend/assets/')}}/plugins/select2/js/select2.full.min.js"></script>


<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $(function () {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                userType: {
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
                password2: {
                    required: true,
                    equalTo: '#password'
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
                userType: {
                    required: "Please enter a user role",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password2: {
                    required: "Please provide a password",
                    equalTo: "Confirm password do not match!"
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
        //Order Approved script
        $(function(){
            $(document).on('click', '#approved', function(e){
                e.preventDefault();
                const link = $(this).attr('action');
                const id = $('#approved_id').val();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be appreved!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approved it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/orders/order-approved',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            type: 'post',
                            success: function(){
                                Swal.fire(
                                'Approved!',
                                'Your file has been approved.',
                                'success'
                                ),
                                $('.' + id).fadeOut();
                            }
                        });
                    }
                     })
            });
        });
    });
  </script>


{{-- User Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#user_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- Logo Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#logo_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#logo_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- /Slider Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#slider_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#slider_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- Mission Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#mission_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#mission_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- Vission Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#vission_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#vission_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- News and Event Image --}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#news_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#news_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

{{-- Product Image--}}
  <script>
      (function($){
          $(document).ready(function(){
            $(document).on('change', '#product_image', function(e){
                e.preventDefault();
                let image_url = URL.createObjectURL(e.target.files[0]);
                $('#product_image_src').attr('src', image_url);
            });
          });
      })(jQuery)
  </script>

//Select2
<script>
    $(function(){
        $('.select2').select2()
    })
</script>
{{-- Notification Message --}}
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


