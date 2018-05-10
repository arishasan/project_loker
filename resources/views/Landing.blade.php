@extends('templates/Top')
@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Log Activity
        </h1>
      </div>
      <h3 style="color:red"><center><?php echo ($user[0]->aktif == 'Tidak' ? 'Akun anda sedang non-aktif.':'') ?></center></h3>
      <div class="row row-cards row-deck">
        <div class="col-12">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Activity</th>
                    <th class="text-center">Table name</th>
                    <th>Created time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($activity as $val)

                    <?php
                      $full = false;
                      $now = new DateTime;
                      $ago = new DateTime($val->created_at);
                      $diff = $now->diff($ago);

                      $diff->w = floor($diff->d / 7);
                      $diff->d -= $diff->w * 7;

                      $string = array(
                        'y' => 'tahun',
                        'm' => 'bulan',
                        'w' => 'minggu',
                        'd' => 'hari',
                        'h' => 'jam',
                        'i' => 'menit',
                        's' => 'detik',
                      );

                      foreach ($string as $k => &$v) {
                        if($diff->$k){
                          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                        }else{
                          unset($string[$k]);
                        }
                      }

                      if(!$full) $string = array_slice($string,0,1);
                      $jamAkhir = $string ? implode(', ',$string) . ' yang lalu' : 'baru saja';
                    ?>

                    <tr>
                      <td>
                        <div>{{ $val->nama }}</div>
                        <div class="small text-muted">
                          Registered: {{ date('d M, Y',strtotime($val->user_submit)) }}
                        </div>
                      </td>

                      <td>
                        <div class="clearfix">
                            <small class="text-muted">{{ $val->activity }}</small>
                        </div>
                      </td>
                      
                      <td class="text-center">
                        {{ $val->nama_table }}
                      </td>
                      
                      <td>
                        <div class="small text-muted">{{ $jamAkhir }}</div>
                      </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection