<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ isset($title)?$title:'E-Surat' }}</title>
    <link rel="icon" type="image/x-icon" href="admin-crock/assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="admin-crock/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="admin-crock/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="admin-crock/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="admin-crock/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="admin-crock/assets/css/forms/switches.css">

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="admin-crock/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="admin-crock/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="admin-crock/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="admin-crock/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="admin-crock/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="admin-crock/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
</head>
<body class="form">
    
    @yield('content')
    

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="admin-crock/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="admin-crock/bootstrap/js/popper.min.js"></script>
    <script src="admin-crock/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="admin-crock/assets/js/authentication/form-2.js"></script>

</body>
</html>