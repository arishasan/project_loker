@extends('templates/Top')
@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Ubah Password
        </h1>
      </div>
      <div class="row row-cards row-deck">
        <div class="col-6 col-sm-4 col-lg-8">
          @include('interface/Alert')
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Type your new password and confirm-password.</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('password/simpan') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="set_id" value="<?php echo $user[0]->id ?>">
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" placeholder="New Password">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <label class="col-sm-2">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
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