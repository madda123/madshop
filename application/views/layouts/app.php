<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>

    <script src="<?= base_url('/docs/5.3/assets/js/color-modes.js') ?>"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.122.0" />
    <title><?= isset($title) ? $title : 'Madshop' ?> - Madda Shop - </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/library/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/library/font/css/all.min.css') ?>" />
</head>
<body>
    <!-- NAVBAR START -->
    <?php $this->load->view('layouts/_navbar'); ?>
    <!-- NAVBAR END -->

    <!-- CONTENT START -->
    <?php $this->load->view($page); ?>
    <!-- CONTENT END -->

    <script src="<?= base_url('assets/library/jquery/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
