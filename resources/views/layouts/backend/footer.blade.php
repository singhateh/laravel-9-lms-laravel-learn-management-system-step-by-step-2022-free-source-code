<script src="{{ asset('jambasangsang/backend/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('jambasangsang/backend/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('jambasangsang/backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('jambasangsang/backend/assets/js/main.js') }}"></script>

@yield('script')
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
