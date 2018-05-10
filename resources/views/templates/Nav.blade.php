<?php
  $get = App\HomeModel::getUser();
?>
<body class="">
<div class="page">
<div class="page-main">
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="{{ url('/') }}">
        <h3 style="font-family: sans-serif;">ProLoker</h3>
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-color: red"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">{{ $get[0]->nama }}</span>
              <small class="text-muted d-block mt-1">{{ $get[0]->level }}</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="{{ url('user/password') }}">
              <i class="dropdown-icon fe fe-settings"></i> Ubah Password
            </a>
            <div class="dropdown-divider"></div>
            <form action="{{ url('logout') }}" method="POST">
              {{ csrf_field() }}
              <button class="dropdown-item" type="submit" style="cursor: pointer;"><i class="dropdown-icon fe fe-log-out"> Sign Out</i></button>
            </form>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link <?php echo (empty(Request::segment(1)) ? 'active':'') ?>"><i class="fe fe-home"></i> Home</a>
          </li>
          
          @if($get[0]->level == 'Admin')
          <li class="nav-item">
            <a href="{{ url('seller') }}" class="nav-link <?php echo (Request::segment(1) == 'seller' ? 'active':'') ?>"><i class="fe fe-box"></i> Seller</a>
          </li>

          <li class="nav-item dropdown">
            <a href="{{ url('price') }}" class="nav-link <?php echo (Request::segment(1) == 'price' ? 'active':'') ?>"><i class="fe fe-calendar"></i> Price</a>
          </li>

          <li class="nav-item dropdown">
            <a href="{{ url('customer') }}" class="nav-link <?php echo (Request::segment(1) == 'customer' ? 'active':'') ?>"><i class="fe fe-file"></i> Customer</a>
          </li>
          @endif
          
          @if($get[0]->level == 'Operator' || $get[0]->level == 'Admin')
          <li class="nav-item dropdown">
            <a href="{{ url('transaksi/sewa') }}" class="nav-link <?php echo (Request::segment(1) == 'transaksi' && Request::segment(2) == 'sewa' ? 'active':'') ?>"><i class="fe fe-book"></i> Sewa/Transaksi</a>
          </li>
          @endif
          
          @if($get[0]->level == 'Owner' || $get[0]->level == 'Admin')
          <li class="nav-item dropdown">
            <a href="#" class="nav-link"><i class="fe fe-check-square"></i> Import CDR</a>
          </li>
          @endif
          
          @if($get[0]->level == 'Owner' || $get[0]->level == 'Admin')
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fe fe-image"></i> Invoice</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('setting') }}" class="nav-link <?php echo (Request::segment(1) == 'setting' ? 'active':'') ?>"><i class="fe fe-file-text"></i> Setting</a>
          </li>
          @endif

        </ul>
      </div>
    </div>
  </div>
</div>