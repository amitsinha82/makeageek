<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 "); // Proxies.
?>

<!DOCTYPE html>
<html lang="en" class='app'>
    <head>
        @include('admin.layout.header_include')
        <script>
            var SITE_URL = "{{url('')}}";
            var admin_per_page_limit = <?php echo config('constants.admin_per_page_limit'); ?>;
            var admin_page_limits = new Array();
<?php foreach (config('constants.admin_page_limits') as $key => $val) { ?>
                admin_page_limits.push(<?php echo $val; ?>);
<?php } ?>

        </script>
    </head>
    <body class="" onunload="" >
        <!-- loading Html -->
        <div class="loading-overpay">
            <div class="loading">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
        </div>
        <!-- loading Html -->
        @yield('content')
        @yield('admin.layout.footer')
        @include('admin.layout.footer_include')
        @yield('scriptjs')
    </body>
</html>