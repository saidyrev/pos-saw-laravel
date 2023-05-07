@extends('layouts.master')

@section('tittle')
    Laporan {{ tanggal_indonesia($tanggalAwal) }} s/d {{ tanggal_indonesia($tanggalAkhir) }}
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-tittle">
                        <div class="head-label text-center"><h5 class="card-title mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tabel Data Kategori</font></font></h5></div>

                        <button onclick="updatePeriode()" type="button" class="btn rounded-pill btn-primary">
                            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Ubah Periode
                        </button>
                        <a href="{{ route('laporan.export.pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank" class="btn rounded-pill btn-dark">
                            <span class="tf-icons bx bx-file"></span>&nbsp; Export PDF
                        </a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-striped">
                            <thead>
                                <th width="8%">No</th>
                                <th>Tanggal</th>
                                <th>Penjualan</th>
                                <th>Pendapatan</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
</div>
@endsection

@push('scripts')
  <script>
    let table;

    $(function () {
        table = $('.table').DataTable({
          processing: true,
          autoWidth: false,
          ajax: {
            url: '{{ route ('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
          },
          columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'tanggal'},
            {data: 'penjualan'},
            {data: 'pendapatan'},
          ]
        });

        .('datepicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true
        })

    function updatePeriode() {
      $('#modal-form').modal('show');
    }

  </script>
@endpush
