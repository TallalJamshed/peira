    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    
    <script type="text/javascript">
        function step1(){
            document.getElementById("nav-profile-tab").click();
            window.scrollTo(0, 0);
        }
        function step2(){
            document.getElementById("nav-contact-tab").click();
            window.scrollTo(0, 0);
        }
        function step3(){
            document.getElementById("nav-about-tab").click();
            window.scrollTo(0, 0);
        }
        function step4(){
            document.getElementById("nav-tandp-tab").click();
            window.scrollTo(0, 0);
        }
        function step5(){
            document.getElementById("nav-overallstrength-tab").click();
            window.scrollTo(0, 0);
        }
        function backstep5(){
            document.getElementById("nav-tandp-tab").click();
            window.scrollTo(0, 0);
        }
        function backstep4(){
            document.getElementById("nav-about-tab").click();
            window.scrollTo(0, 0);
        }
        function backstep3(){
            document.getElementById("nav-contact-tab").click();
            window.scrollTo(0, 0);
        }
        function backstep2(){
            document.getElementById("nav-profile-tab").click();
            window.scrollTo(0, 0);
        }
        function backstep1(){
            document.getElementById("nav-home-tab").click();
            window.scrollTo(0, 0);
        }
        $(':input[type="number"]').keydown(function(){
            return event.keyCode !== 69 
        });
    </script>
    <script>
        $('#fk_school_id').change(function(){
            var inst_id = $('#fk_school_id').find(':selected').val()
            if(inst_id == 1901){
                $('#inst_div').append('<span style="color: red">In Case of other institute please enter Institute Name manually.</span><br><label>Name of the Institution</label> <span style="font-size:11px; color:red;">*</span><input type="text" id="inst_name" name="inst_name" value="" placeholder="Name" class="form-control" /><br />');
            }else{
                $('#inst_div').empty();
            }
        });
    </script>
    <script>
        function download(url){
            window.open(url, '_blank');
        };
        $(document).ready(function(){
            if($('#file_download').data('url')){
                download($('#file_download').data('url'));
            };
        });
        $('#file_download').click(function(){
            if($('#file_download').data('url')){
                download($('#file_download').data('url'));
            };
        });
    </script>

    <script>
        $('#form-sub').click(function(e){
            e.preventDefault();
            
            $('#savemodal').modal();
        });
        $('#saveform').click(function(){
            $('#regform').submit();
        });
    </script>
    