@php
    $menus = [
        [
            'name' => 'Dashboard',
            'icon' => 'bx bx-home-circle',
            'route' => route('dashboard.index'),
            'is_admin' => true,
        ],
        [
            'label' => 'Menu Utama',
            'separator' => true,
        ],
        [
            'name' => 'Daftar Buku',
            'icon' => 'bx bx-book',
            'route' => route('dashboard.book.index'),
            'is_admin' => true,
        ],
        [
            'name' => 'Daftar Siswa',
            'icon' => 'bx bx-user',
            'route' => route('dashboard.student.index'),
            'is_admin' => true,
        ],
        [
            'name' => 'Transaksi',
            'icon' => 'bx bx-book-add',
            'route' => null,
            'is_admin' => true,
            'child' => [
                [
                    'name' => 'Peminjaman Buku',
                    'route' => route('dashboard.transaction.index'),
                ],
                [
                    'name' => 'Unduh laporan',
                    'route' => null
                ]
            ],
        ],
        [
            'label' => 'Lainnya',
            'separator' => true,
        ],
        [
            'name' => 'Logout',
            'icon' => 'bx bx-log-out',
            'route' => route('logout'),
            'is_admin' => true,
        ],
    ];

@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width:60px;heigth:60px;margin-right:16px;"> --}}
            <span class="demo menu-text fw-bolder" style="text-transform: capitalize !important;font-size:22px;">
               Rensa Library's
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menus as $menu)
            @if (isset($menu['separator']) && $menu['separator'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu['label'] }}</span>
                </li>
            @elseif (isset($menu['child']))
                <li class="menu-item {{ $menu['name'] }}">
                    <a href="javascript::void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons {{ $menu['icon'] }}"></i>
                        <div>{{ $menu['name'] }}</div>
                    </a>
                    <ul class="menu-sub">
                        @foreach ($menu['child'] as $childMenu)
                            <li class="menu-item">
                                <a href="{{ $childMenu['route'] }}" class="menu-link child-menu">
                                    <div>{{ $childMenu['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class="menu-item {{ $menu['name'] }}" style="text-transform: capitalize">
                    <a href="{{ isset($menu['route']) ? $menu['route'] : rand() }}" class="menu-link">
                        <i class="menu-icon tf-icons {{ $menu['icon'] }}"></i>
                        <div>{{ $menu['name'] }}</div>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>


</aside>

<script>
    // get route and list menu from sidebar,then if has a route with link from sidebar make it active
    let currentLocation = window.location.href;
    currentLocation = currentLocation.replace(/\/create/g, '');
    currentLocation = currentLocation.split('/').pop();

    const menuItem = document.querySelectorAll('.menu-item a');

    // remove all active class and open from sidebar
    menuItem.forEach(item => {
        item.parentElement.classList.remove('active');
        item.parentElement.classList.remove('open');
    });

    menuItem.forEach(item => {
        let href = item.getAttribute('href').split('/').pop();
        // console.log(href)
        if (href.includes(currentLocation)) {
            // item.parentElement.classList.add('active');

            // // if this child menu, make parent level 4 active and open
            // if (item.parentElement.parentElement.classList.contains('menu-sub')) {
            //     item.parentElement.parentElement.parentElement.classList.add('active');
            //     item.parentElement.parentElement.parentElement.classList.add('open');
            // }
        }
    });
</script>
