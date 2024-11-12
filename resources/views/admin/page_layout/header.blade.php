<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets_admin/images/favicon.png') }}">
    <title>Admin page</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets_admin/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        /* Style for the select box */
select#order_status {
    /* width: 100%; */
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    color: #333;
    font-size: 16px;
    font-family: 'Roboto', sans-serif;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-repeat: no-repeat;
    background-position: right 10px center;
    cursor: pointer;
    transition: border-color 0.3s, box-shadow 0.3s;
}

/* Style for the options */
select#order_status option {
    padding: 12px;
    background-color: #fff;
    color: #333;
    font-size: 16px;
    font-family: 'Roboto', sans-serif;
}

/* Style for the select box on focus */
select#order_status:focus {
    border-color: #66afe9;
    outline: none;
    box-shadow: 0 0 10px rgba(102, 175, 233, 0.5);
}

/* Additional styles to enhance the appearance */
select#order_status:hover {
    border-color: #aaa;
}

select#order_status:active {
    border-color: #66afe9;
    box-shadow: 0 0 5px rgba(102, 175, 233, 0.3);
}

/* Add custom arrow */
select#order_status::after {
    content: '▼';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    font-size: 12px;
    color: #333;
}
   .image-container {
        display: flex;
        flex-wrap: wrap; /* Nếu bạn muốn các ảnh xuống dòng khi không đủ chỗ */
    }

    .image-container img {
        margin: 5px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        @if (session('msg'))
            <script>
                alert('{{ session('msg') }}')
            </script>
        @endif

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
