<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $data['page_title']; ?></title>
    <link rel="icon" type="image/png" href="https://i.imgur.com/x0pRK7B.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/stisla/assets/css/components.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/css/custom.css">
    

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php require_once("./views/template/navbar_dashboard.php")?>
            <!-- Main Content -->
            <div class="main-content">
