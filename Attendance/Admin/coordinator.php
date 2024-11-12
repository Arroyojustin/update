<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ./index.php');
    exit();
}

// Include database connection
include './dbconn.php';

// Determine which page to load
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default to home if no page is specified
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>coordinator</title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/attendance.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        #wrapper {
            display: flex;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        #content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f8f8;
        }

        #content {
            padding: 1rem;
            flex-grow: 1;
            background-color: #f8f8f8;
        }

        #page-content {
            flex-grow: 1;
            padding: 10px;
        }

        /* Loading screen style */
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>
</head>

<body id="page-top">

    <!-- Loading Screen -->
    <div id="loading-overlay">
        <div class="spinner"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar-->
        <?php include('components/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Header Content -->
            <?php include('./components/header.php'); ?>

            <!-- Main Content -->
            <div id="content">

              

                 <!-- Begin Page Content -->
                 <div id="page-content" style="width: 100%;">
                    <?php include "pages/home.php"; ?>
                    <?php include "pages/reports.php"; ?>
                    <?php include "pages/attendance.php"; ?>
                    <?php include "pages/tasks.php"; ?>
                    <?php include "pages/students.php"; ?>
                    <?php include "pages/add_student.php"; ?>
                    <?php include "pages/student-cred.php"; ?>
                    <?php include "pages/profile.php"; ?>
                </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/29c04b1733.js" crossorigin="anonymous"></script>
    <script src="../js/sidebar.js"></script>

    <!--START::CRUD AJAX FUNCTIONS-->
    <script src="./Ajax/retrieve_ajax.js"></script>
    <script src="./Ajax/profile-access.js"></script>
    <script src="./Ajax/drag-drop.js"></script>
    <script src="./Ajax/button-funtion.js"></script>
    <script src="./Ajax/create-upload.js"></script>

    <script>
        // Hide loading overlay once the page content is fully loaded
        $(window).on('load', function() {
        setTimeout(function() {
            $('#loading-overlay').fadeOut();
        }, 1000); // 2000ms = 2 seconds
    });
    </script>

</body>
</html>
