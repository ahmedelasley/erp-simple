<!-- begin::Footer scripts -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/back/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/back/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('assets/back/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/back/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/back/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/back/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/back/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/back/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/back/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/back/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/back/plugins/side-menu/sidemenu.js')}}"></script>

<!-- end::Footer scripts -->

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


<script>
    let isRedirecting = false; // Flag to prevent multiple redirects

    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault(); // Stop Livewire's default behavior

                if (!isRedirecting) {
                    isRedirecting = true; // Set the flag to true
                    window.location.href = '/login'; // Redirect to login route
                }
            }
        });
    });
    </script>
