<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 "); // Proxies.
?>

<!DOCTYPE html>
<html lang="en" class='app'>
    <head>
        @include('front.layout.header_include')
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
        
        <!-- loading Html -->
        @yield('content')
        @include('front.layout.footer_include')
        @yield('scriptjs')
    </body>
</html>