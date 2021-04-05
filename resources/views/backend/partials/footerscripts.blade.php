<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.
tables.net/1.10.22/js/jquery.dataTables.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src ="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://nightly.datatables.net/buttons/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCURCbYEluowlwd2_bl2sMjh5UZaDJFGsU&callback=initMap"async defer></script>

<script>
$(document).ready(function() {
    $('#reportDataTable').DataTable( {
      "lengthMenu": [[20, 30, 50, -1], [20, 30, 50, "All"]],
      "pageLength": 20,
      "bFilter": false
        
    } );
} );
</script>

   <script>
  $(document).ready(function (){
      $.fn.dataTable.moment( 'MM-DD-YYYY' );
  $('#dataTable1').dataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "columnDefs": [{ 
                                "type":'datetime-moment', 
                                "targets": 7 
                                }]
                          });

  });
</script>