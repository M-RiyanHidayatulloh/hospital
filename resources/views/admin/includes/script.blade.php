 <!-- Required Js -->
 <script src="{{asset('admin/dist/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('admin/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/dist/assets/js/pcoded.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('admin/dist/assets/js/plugins/apexcharts.min.js')}}"></script>


<!-- custom-chart js -->
<script src="{{asset('admin/dist/assets/js/pages/dashboard-main.js')}}"></script>
@yield('jstable')
@include ('sweetalert::alert')
@if (Session::has('success'))
<script>
    swal("Message", "{{ Session::get('success')}}", 'success', {
        button:true,
        button:"OK",
    });
</script>
@endif