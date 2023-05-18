<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $logo = DB::table('profile')->get();
    ?>
    @foreach ($logo as $item)
        <title>{{ $item->title }} - Kasir</title>
        <link rel="shortcut icon" href="{{ asset('image/'.$item->image) }}" type="image/x-icon">
    @endforeach

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">


    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo"> 
                            {{-- <?php
                                $logo = DB::table('profile')->get();
                            ?>
                            @foreach ($logo as $item)
                            <table>
                                <tr>
                                    <td><img src="{{ asset('image/'.$item->image) }}" alt="Logo" style="width: 60px;height: 60px;"></td>
                                    <td><span style="font-size: 17px; padding-left:10px;">{{ $item->title }}</span></td>
                                </tr>
                            </table>
                            
                            @endforeach --}}
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ route('kasir.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('menu.menukasir') }}" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>List Menu</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('order.kasir') }}" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Pesanan</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('history.index') }}" class='sidebar-link'>
                                <i class="bi bi-clock-history"></i>
                                <span>History Pemesanan</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Keluar Account</li>

                        <li class="sidebar-item active ">
                            <a href="/logout" class='sidebar-link'>
                                <i class="bi bi-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <section>
            @yield('content')
        </section>

    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="/assets/js/main.js"></script>
</body>

</html>