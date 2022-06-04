<script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('summernote/summernote-lite.js')}}"></script>
    <script>
          new WOW().init();
    </script>
    <script>
            $(".del").click(function(){
        return confirm('are you sure you want to delete this record');
            });

            // --------------------------------------


       $(document).ready(function(){
        $('#summernote').summernote({
             height:200
        });
    });
    </script>

 