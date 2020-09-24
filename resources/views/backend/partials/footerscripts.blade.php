<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
{{-- <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> --}}
{{-- <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Registered", "Un-Registered", "Under Process"],
    datasets: [{
      data: [442, 127, 572],
      backgroundColor: ['#1cc88a', '#36b9cc', '#4e73df'],
      hoverBackgroundColor: ['#00ab2d', '#006cab', '#0033c7'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat: 33.5099344, lng: 73.0888045}
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var count = 0;

        $.ajax({
            url:'/peiraadmin/public/getschools',
            type: 'post',
            datatype: 'json',
            data:{_token:'{{csrf_token()}}'},
            header:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                // console.log(data);
                data.forEach(element => {
                    count++;
                    var pinpoint;
                    // pinpoint = "{{asset('img/red_pin.png')}}";
                    if(element.status_since > 0 && ( element.status_reg == 'Applied For Renewal' || element.status_reg == 'Renewal' || element.status_reg == '' ) ){
                        pinpoint = "{{asset('img/green_pin.png')}}";
                    }
                    if(element.status_reg == 'Never Applied For Registration'){
                    pinpoint = "{{asset('img/red_pin.png')}}";
                    }
                    if(element.status_reg == 'New Registration' || element.status_reg == 'Renewal' || element.status_reg == 'Applied For Renewal' ){
                    pinpoint = "{{asset('img/yellow_pin.png')}}";
                    }
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(element.latitude, element.longitude),
                        map: map,
                        icon: {
                            url: pinpoint
                        }
                    });
                //     var subarea;
                //     if(element.subarea_name == "NA"){
                //     subarea = ", ";
                //     }else{
                //     subarea = ', '+element.subarea_name+', ';
                //     }
                //     // "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    var markercontent = '<div><h2>'+element.inst_name+'</h2></div>'+
                                        '<div><a href="/peiraadmin/public/school/edit/'+element.reg_id+'" class="btn btn-sm btn-warning">More Info</a></div>';
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(markercontent);
                        infowindow.open(map, marker);
                    }
                    })(marker, i));
                });
            // $('#provschool').text(count);
            },
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCURCbYEluowlwd2_bl2sMjh5UZaDJFGsU&callback=initMap"async defer></script>

<script>
  $('.deleteschool').click(function(){
    var id= $(this).data('id');
    $('#deleteModal').modal();
    $('#reg_id').val(id);
  });
  $(':input[type="number"]').keydown(function(){
    return event.keyCode !== 69 
  });
</script>
<script>
  function checkFormStatus(){
      var status_name = $('#status_reg').find(':selected').val();
      if(status_name == "Registered")
      {
        $('#status_reg_div').empty()
        $('#status_reg_div').append('<div class="one" style="width:50%"><span style="color: red"></span><br><label>Registration Number</label> <span style="font-size:11px; color:red;">*</span><input type="text" id="" name="form_reg_no" value="@isset($school){{$school->form_reg_no}}@endisset" placeholder="Registration Number" class="col-md-6 form-control" required/></div><div class="two" style="float:right; width:50%; margin-top:-70px"> <label>Expiry Date</label> <span style="font-size:11px; color:red;">*</span><input type="date" id="" name="expiry_date" value="@isset($school){{$school->expiry_date}}@endisset" placeholder="Expiry Date" class="col-md-6 form-control" required/></div><br />');
      }else if(status_name == "Applied For Renewal")
      { 
        $('#status_reg_div').empty()
          $('#status_reg_div').append('<span style="color: red"></span><br><label>Date of application submission</label> <span style="font-size:11px; color:red;">*</span><input type="date" id="" name="date_of_app_submit" value="@isset($school){{$school->date_of_app_submit}}@endisset" placeholder="Date of Application Submission" class="form-control col-md-6" required/><br />');
      }
      else if(status_name == "Never Applied For Registration")
      {
        $('#status_reg_div').empty()
      }
      else if(status_name == "New Registration")
      {
        $('#status_reg_div').empty()
          $('#status_reg_div').append('<span style="color: red"></span><br><label>Date of application submission</label> <span style="font-size:11px; color:red;">*</span><input type="date" id="" name="date_of_app_submit" value="@isset($school){{$school->date_of_app_submit}}@endisset" placeholder="Date of Application Submission" class="form-control col-md-6" required/><br />');
      }
      else if(status_name == "Registration expired before 5 years")
      {        
          $('#status_reg_div').empty();
          $('#status_reg_div').append('<label>Expiry Date</label> <span style="font-size:11px; color:red;">*</span><input type="date" id="" name="expiry_date" value="@isset($school){{$school->expiry_date}}@endisset" placeholder="Expiry Date" class="col-md-6 form-control" required/><br>');
      }
      else
      {
          $('#status_reg_div').empty();
      }
  }
  
  $('#status_reg').change(function(){
    checkFormStatus();
  });

  $(document).ready(function(){
    checkFormStatus();
  });
</script>