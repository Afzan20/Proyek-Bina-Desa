<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Dashboard | Proyek Bina Desa')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-template/img/favicon.png') }}">

    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets-template/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-template/css/nucleo-svg.css') }}">

    <!-- Soft UI Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets-template/css/soft-ui-dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    @stack('styles')
</head>
