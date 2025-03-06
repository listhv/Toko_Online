@extends('backend.v_layouts.app')
@section('content')

<!--- contentAwal --->
<div class="row">
  <div class="card">
    <div class="card-body border-top">
      <h5 class="card-title">{{ $judul }}</h5>
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama }}</h4>
        Aplikasi Kpop Shop dengan hak akses yang anda miliki sebagai
        <b>
          @if (Auth::user()->role == 1)
          Super Admin
          @elseif (Auth::user()->role == 0)
          Admin
          @endif
        </b>
        ini adalah halaman utama dari aplikasi web programming, Kpop Shop project.
      <hr>
      <p>Belanja....? Kpop SHop Aja !!</p>
      </div>
    </div>
  </div>
</div>
<!--- contentAkhir --->
@endsection
