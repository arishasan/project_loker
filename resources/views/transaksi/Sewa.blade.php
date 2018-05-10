@extends('templates/Top')
@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Transaction
        </h1>
      </div>
      <div class="row row-cards row-deck" <?php echo ($user[0]->aktif) == 'Tidak' ? 'hidden="true"':''?> />
        <div class="col-12">
          @include('interface/Alert')
        </div>
          <div class="col-12" id="data_customer">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Costumer</h3>
                <div class="card-options">
                  <button type="button" class="btn btn-danger" id="hide_data_customer"><i class="fa fa-remove"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-outline table-vcenter text-nowrap card-table" id="data_table_holder">
                    <thead>
                      <tr>
                        <th hidden="true">Id</th>
                        <th>No. </th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Kota</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="customer_record">
                      <?php 
                      $i = 1;
                        foreach($customer_list as $val){ ?>
                          <tr>
                            <td hidden="true">
                              {{ $val->id }} <input type="hidden" value="{{ $val->id }}">
                            </td>

                            <td>
                              {{ $i }}.
                            </td>
                            
                            <td>
                              {{ $val->nama_perusahaan }} <input type="hidden" value="{{ $val->nama_perusahaan }}">
                            </td>
                            
                            <td>
                              {{ $val->alamat }} <input type="hidden" value="{{ $val->alamat }}">
                            </td>

                            <td>
                              {{ $val->no_telpon }} <input type="hidden" value="{{ $val->no_telpon }}">
                            </td>

                            <td>
                              {{ $val->kota }} <input type="hidden" value="{{ $val->kota }}">
                            </td>

                            <td>
                              <div>
                                <button type="button" class="btn btn-success pick_customer" title="Pilih"><i class="fa fa-check"></i></button>
                              </div>
                            </td>
                          </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-4 text-center">
                      <i>Keterangan Customer</i>
                    </div>
                    <h4 class="card-title" id="nama_cust">[ Nama ]</h4>
                    <div class="card-subtitle" id="alamat_cust">
                      [ Alamat ]
                    </div>
                    <div class="mt-5 d-flex align-items-center">
                      <div class="ml-auto">
                        <a href="javascript:void(0)" class="btn btn-primary" id="open_table_customer"><i class="fe fe-plus"></i> Ambil Customer</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-4 text-center">
                      <i>Keterangan dan harga sewa</i>
                    </div>
                    <div class="card-subtitle" id="keterangan_price">
                      [ Keterangan ]
                    </div>
                    <div class="mt-5 d-flex align-items-center">
                      <div class="product-price">
                        <strong>Rp. <b id="show_total_price"></b></strong>
                      </div>
                      <div class="ml-auto">
                        <a href="javascript:void(0)" id="calculate_ket" class="btn btn-info">Calculate</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Paket <b style="color: red; font-size: 12px">Checklist paket yang dipilih</b></h3>
              </div>
              <form action="{{ url('transaksi/simpan') }}" method="POST"> <!-- TAG OPEN FORM -->
                <div class="card-body o-auto" style="height: 15rem">
                  <ul class="list-unstyled list-separated" id="holder_list_paket">
                    @foreach($list_paket as $val)
                    <li class="list-separated-item item_class">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <input type="checkbox" class="cek_paket">
                        </div>
                        <div class="col">
                          <div>
                            <p class="id_paket" hidden="true">{{ $val->id }}</p>
                            <a href="javascript:void(0)" class="text-inherit">{{ $val->nama_paket }}</a>
                          </div>
                          <small class="d-block item-except text-sm text-muted h-1x">{{ $val->description }}</small>
                        </div>
                        <div class="col">
                          <small class="d-block item-except text-sm text-muted h-1x">Local Rp. <b class="local">{{ $val->local }}</b> | Non Local Rp. <b class="non_local">{{ $val->non_local }}</b></small>
                        </div>
                        <div class="col-auto tools">
                            {{ csrf_field() }}
                            <div id="holder_id"></div>
                            <div class="appendSetting"></div>
                            <div class="result"></div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            <div class="ml-auto">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form> <!-- TAG CLOSED FORM -->
      </div>
    </div>
  </div>
</div>
@endsection