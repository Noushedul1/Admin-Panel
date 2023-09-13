<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('asset') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('asset') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('asset') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('asset') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('asset') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('asset') }}/js/demo/chart-pie-demo.js"></script>
{{-- summernote  --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- datatable  --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
@stack('script')
