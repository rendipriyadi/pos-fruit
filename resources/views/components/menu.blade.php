<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i
                        class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            {{-- master data --}}
            <li class=" navigation-header"><span data-i18n="Apps">Master Data</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i></li>
            <li class=" nav-item"><a href="{{ route('backsite.kategori_buah.index') }}"><i
                        class="{{ request()->is('backsite/kategori_buah') || request()->is('backsite/kategori_buah/*') || request()->is('backsite/*/kategori_buah') || request()->is('backsite/*/kategori_buah/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Kategori Buah">Kategori Buah</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('backsite.item_buah.index') }}"><i
                        class="{{ request()->is('backsite/item_buah') || request()->is('backsite/item_buah/*') || request()->is('backsite/*/item_buah') || request()->is('backsite/*/item_buah/*') ? 'bx bx-plus-medical bx-flashing' : 'bx bx-plus-medical' }}"></i><span
                        class="menu-title" data-i18n="Item Buah">Item Buah</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('backsite.customer.index') }}"><i
                        class="{{ request()->is('backsite/customer') || request()->is('backsite/customer/*') || request()->is('backsite/*/customer') || request()->is('backsite/*/customer/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Customer">Customer</span></a>
            </li>

            {{-- transaksi --}}
            <li class=" navigation-header"><span data-i18n="Apps">Transaksi</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i></li>
            <li class=" nav-item"><a href="{{ route('backsite.order.index') }}"><i
                        class="{{ request()->is('backsite/order') || request()->is('backsite/order/*') || request()->is('backsite/*/order') || request()->is('backsite/*/order/*') ? 'bx bx-wallet-alt bx-flashing' : 'bx bx-wallet-alt' }}"></i><span
                        class="menu-title" data-i18n="POS">POS</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('backsite.riwayat_transaksi.index') }}"><i
                        class="{{ request()->is('backsite/riwayat_transaksi') || request()->is('backsite/riwayat_transaksi/*') || request()->is('backsite/*/riwayat_transaksi') || request()->is('backsite/*/riwayat_transaksi/*') ? 'bx bx-wallet-alt bx-flashing' : 'bx bx-wallet-alt' }}"></i><span
                        class="menu-title" data-i18n="Riwayat Transaksi">Riwayat Transaksi</span></a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i></li>

            {{-- @can('management_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') || request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Management Access">Management Access</span></a>
                <ul class="menu-content">
                    {{-- @can('type_user_access') --}}
                    <li
                        class="{{ request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'active' : '' }} ">
                        <a class="menu-item" href="{{ route('backsite.type_user.index') }}">
                            <i></i><span>Type User</span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('user_access') --}}
                    <li
                        class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                        <a class="menu-item" href="{{ route('backsite.user.index') }}">
                            <i></i><span>User</span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('setting') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('logout') || request()->is('backsite/profile') || request()->is('backsite/profile/*') || request()->is('backsite/*/profile') || request()->is('backsite/*/profile/*') ? 'bx bx-brightness bx-flashing' : 'bx bx-brightness' }}"></i><span
                        class="menu-title" data-i18n="Setting">Setting</span></a>
                <ul class="menu-content">
                    {{-- @can('profile') --}}
                    <li
                        class="{{ request()->is('backsite/profile') || request()->is('backsite/profile/*') || request()->is('backsite/*/profile') || request()->is('backsite/*/profile/*') ? 'active' : '' }} ">
                        <a class="menu-item" href="{{ route('backsite.profile.index') }}">
                            <i></i><span>Profil</span>
                        </a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('logout') --}}
                    <li class="{{ request()->is('logout') ? 'active' : '' }} ">
                        <a class="menu-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i></i><span>Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
