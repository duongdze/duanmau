<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    // Bảo vệ trang admin, yêu cầu đăng nhập
    if (empty($_SESSION['user'])) {
        header('Location: ' . BASE_URL_ADMIN . '&action=login');
        exit;
    }
?>
<div class="d-flex">
    <?php require_once 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <div class="container-fluid">
            <h1><?= $title ?? 'Dashboard' ?></h1>

