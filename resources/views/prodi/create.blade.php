@extends('layout.main')
@section('title', 'Prodi')

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4" bis_skin_checked="1">
                <!--begin::Header-->
                <div class="card-header" bis_skin_checked="1"><div class="card-title" bis_skin_checked="1">Tambah Fakultas</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{ route('prodi.store')}}" method="POST">
                    @csrf
                  <!--begin::Body-->
                  <div class="card-body" bis_skin_checked="1">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" value={{ old('nama') }}>
                      @error('nama')
                        <div class="text-danger">
                            {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3" bis_skin_checked="1">
                      <label for="singkatan" class="form-label">Singkatan</label>
                      <input type="text" class="form-control" name="singkatan"value={{ old('singkatan') }}>
                      @error('singkatan')
                        <div class="text-danger">
                            {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3" bis_skin_checked="1">
                        <label for="dekan" class="form-label">Nama Dekan</label>
                        <input type="text" class="form-control" name="dekan"value={{ old('dekan') }}>
                        @error('dekan')
                          <div class="text-danger">
                              {{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3" bis_skin_checked="1">
                        <label for="wakil_dekan" class="form-label">Nama Wakil Dekan</label>
                        <input type="text" class="form-control" name="wakil_dekan"value={{ old('wakil_dekan') }}>
                        @error('wakil_dekan')
                          <div class="text-danger">
                              {{ $message }}</div>
                          @enderror
                    </div>
                  </div>
                  <!--end::Body-->
                  <!--begin::Footer-->
                  <div class="card-footer" bis_skin_checked="1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <!--end::Footer-->
                </form>
                <!--end::Form-->
              </div>
        </div>
    </div>

@endsection