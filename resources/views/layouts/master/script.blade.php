@section('javascript')  
<script src="{{asset('js/app.js')}}"></script> 
<script src="{{asset('js/dashboard.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('vendors/flot/jquery.flot.pie.js') }}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/misc.js')}}"></script>

@stop