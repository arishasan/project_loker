@extends('templates/Top')
@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Packet Price
        </h1>
      </div>
      <div class="row row-cards row-deck" <?php echo ($user[0]->aktif) == 'Tidak' ? 'hidden="true"':''?> />
        <div class="col-6 col-sm-4 col-lg-2" style="cursor: pointer;" id="add_data_price">
          <div class="card">
            <div class="card-body p-3 text-center">
              <div class="text-right text-green">
                <i class="fe fe-chevron-up"></i>
              </div>
              <div class="h1 m-0"><i class="fa fa-plus text-green"></i></div>
              <div class="text-muted mb-4">Add Data</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2" style="cursor: pointer;" id="show_data_price">
          <div class="card">
            <div class="card-body p-3 text-center">
              <div class="text-right text-green">
                <i class="fe fe-chevron-up"></i>
              </div>
              <div class="h1 m-0"><i class="fa fa-database text-blue"></i></div>
              <div class="text-muted mb-4">Show Data</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-8">
          @include('interface/Alert')
          <div id="showPromptDelete"></div>
        </div>

        <div class="col-12" id="data_holder">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table" id="data_table_holder">
                  <thead>
                    <tr>
                      <th hidden="true">Id</th>
                      <th>No. </th>
                      <th>Nama Paket</th>
                      <th>Local</th>
                      <th>Non Local</th>
                      <th>Deskripsi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="price_all_rec">
                    <?php 
                    $i = 1;
                      foreach($price_list as $val){ ?>
                        <tr>
                          <td hidden="true">
                            {{ $val->id }} <input type="hidden" value="{{ $val->id }}">
                          </td>

                          <td>
                            {{ $i }}.
                          </td>
                          
                          <td>
                            {{ $val->nama_paket }} <input type="hidden" value="{{ $val->nama_paket }}">
                          </td>
                          
                          <td>
                            {{ $val->local }} <input type="hidden" value="{{ $val->local }}">
                          </td>

                          <td>
                            {{ $val->non_local }} <input type="hidden" value="{{ $val->non_local }}">
                          </td>

                          <td>
                            {{ $val->description }} <input type="hidden" value="{{ $val->description }}">
                          </td>

                          <td>
                            <div>
                              <button type="button" class="btn btn-warning edit_rec" title="Edit"><i class="fa fa-pencil"></i></button>
                              <button type="button" class="btn btn-danger delete_rec" title="Delete"><i class="fa fa-remove"></i></button>
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

        <div class="col-12" id="add_holder">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Data</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('Price/simpan') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Nama Paket</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_paket">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Local</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="local">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Non Local</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="non_local">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="description">
                    </div>
                  </div>
                </div>
                <div class="btn-list mt-4 text-right">
                  <button type="button" class="btn btn-secondary btn-space" id="cancel_submit">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-space">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-12" id="edit_holder">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Data</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('Price/update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="price_id" id="price_id">
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Nama Paket</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_paket" id="nama_paket">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Local</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="local" id="local">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Non Local</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="non_local" id="non_local">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="description" id="description">
                    </div>
                  </div>
                </div>
                <div class="btn-list mt-4 text-right">
                  <button type="button" class="btn btn-secondary btn-space" id="cancel_submit_edit">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-space">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection