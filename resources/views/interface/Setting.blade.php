@extends('templates/Top')
@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Setting
        </h1>
      </div>
      <div class="row row-cards row-deck" <?php echo ($user[0]->aktif) == 'Tidak' ? 'hidden="true"':''?> />
        <div class="col-6 col-sm-4 col-lg-8">
          @include('interface/Alert')
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Change Data</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('setting/simpan') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="set_id" value="<?php echo (empty($data_setting[0]->id) ? '':$data_setting[0]->id) ?>">
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">SLI</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="SLI" value="<?php echo (empty($data_setting[0]->SLI) ? '':$data_setting[0]->SLI) ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">SLJ</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="SLJ" value="<?php echo (empty($data_setting[0]->SLJ) ? '':$data_setting[0]->SLJ) ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">SMS Domestic</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="SMS_dom" value="<?php echo (empty($data_setting[0]->SMS_domestic) ? '':$data_setting[0]->SMS_domestic) ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">SMS International</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" name="SMS_int" value="<?php echo (empty($data_setting[0]->SMS_international) ? '':$data_setting[0]->SMS_international) ?>">
                    </div>
                  </div>
                </div>
                <div class="btn-list mt-4 text-right">
                  <button type="submit" class="btn btn-primary btn-space">Save</button>
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