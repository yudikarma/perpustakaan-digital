<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Perpustakaan Digital') ?> | UNSIA</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 260px;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --bg-sidebar: #0f172a;
            --card-radius: 16px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: #94a3b8;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        #sidebar .brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 1.2rem;
            font-weight: 800;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #sidebar .brand i {
            color: #818cf8;
        }

        #sidebar .nav-menu {
            list-style: none;
            padding: 1.5rem 0.75rem;
            margin: 0;
            flex-grow: 1;
        }

        #sidebar .nav-item {
            margin-bottom: 0.35rem;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1rem;
            color: #94a3b8;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.06);
        }

        #sidebar .nav-link.active {
            background-color: var(--primary);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        #sidebar .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        #sidebar .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.8rem;
            color: #64748b;
            text-align: center;
        }

        /* Main Content */
        #content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-width));
            transition: all 0.3s ease;
        }

        /* Topbar */
        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .main-content {
            padding: 2rem;
            flex-grow: 1;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: var(--card-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            background-color: #fff;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
            font-weight: 700;
        }

        /* Dashboard widgets */
        .widget-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem;
        }

        .widget-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .widget-indigo {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary);
        }

        .widget-teal {
            background-color: rgba(20, 184, 166, 0.1);
            color: #14b8a6;
        }

        .widget-orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: #f97316;
        }

        /* Book Covers */
        .book-cover-container {
            position: relative;
            padding-top: 140%; /* 5:7 Aspect Ratio */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            background-color: #e2e8f0;
        }

        .book-cover-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .book-card:hover .book-cover-img {
            transform: scale(1.05);
        }

        /* Pagination style override */
        .pagination {
            gap: 5px;
        }

        .pagination li a {
            border-radius: 6px !important;
            border: none;
            background-color: #f1f5f9;
            color: #475569;
            padding: 0.5rem 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pagination li.active a, .pagination li a:hover {
            background-color: var(--primary) !important;
            color: #fff !important;
        }

        .pagination li.disabled a {
            background-color: #f8fafc;
            color: #cbd5e1;
            pointer-events: none;
        }

        /* SweetAlert Custom styling */
        .swal2-popup {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            border-radius: var(--card-radius) !important;
        }
    </style>
</head>
<body>
    <div id="wrapper" style="display: flex; min-height: 100vh; width: 100vw;">
