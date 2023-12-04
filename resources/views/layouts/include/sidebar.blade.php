<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="#" href="{{ route('dashboard') }}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>

            </li>

            <li class="nav-label">Data</li>
            <li><a href="{{ route('balita.index') }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span
                        class="nav-text" href="data_balita/index.php">Data Balita</span></a>
            </li>


            <li class="nav-label">Perhitungan</li>
            <li><a href="{{ route('klasifikasi') }}" aria-expanded="false"><i class="icon icon-form"></i><span
                        class="nav-text" href="klasifikasi/index.php">Klasifikasi Naive Bayes</span></a>
            </li>

            <li><a href="{{ route('klasifikasi.list') }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span
                        class="nav-text">Hasil Klasifikasi</span></a>
            </li>

            <li class="nav-label">Pengujian</li>
            <li><a href="{{ route('uji.index') }}" aria-expanded="false"><i class="icon icon-form"></i><span
                        class="nav-text" href="klasifikasi/index.php">Uji data</span></a>
            </li>

            {{-- <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('register')}}">Register</a></li>
                    <li><a href="{{route('login')}}">Logout</a></li>
                    
                </ul>
            </li> --}}
        </ul>
    </div>


</div>
