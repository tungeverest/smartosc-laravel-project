
<div class="clearfix"></div>
{{-- <footer class="site-footer">
  <div class="text-center">
    Create by Group 1 &copy FR11-2017----SmartOsc.com
    <a href="#" class="go-top">
      <i class="fa fa-angle-up"></i>
  </a>
</div>
</footer> --}}
<!--footer end-->
</section>
<script src="{{ asset('public/admin/js/jquery.js')}}"></script>
  <script src="{{ asset('public/admin/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{ asset('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{ asset('public/admin/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{ asset('public/admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="{{ asset('public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}" type="text/javascript"></script>
  <script src="{{ asset('public/admin/js/owl.carousel.js')}}" type="text/javascript"></script>
  <script src="{{ asset('public/admin/js/jquery.customSelect.min.js')}}" ></script>
  <script src="{{ asset('public/admin/js/respond.min.js')}}" ></script>

  <!--right slidebar-->
  <script src="{{ asset('public/admin/js/slidebars.min.js')}}"></script>

  <!--common script for all pages-->
  <script src="{{ asset('public/admin/js/common-scripts.js')}}"></script>

  <!--script for this page-->
  <script src="{{ asset('public/admin/js/sparkline-chart.js')}}"></script>
  <script src="{{ asset('public/admin/js/easy-pie-chart.js')}}"></script>
  <script src="{{ asset('public/admin/js/count.js')}}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
        $("#owl-demo").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true,
          autoPlay:true

        });
      });

      //custom select box

      $(function(){
        $('select.styled').customSelect();
      });
      // Click dropdown-menu
      $(document).on('click', '.yamm .dropdown-menu', function(e) {
        e.stopPropagation()
      })

    </script>

  </body>

  <!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
  </html>

</body>
</html>