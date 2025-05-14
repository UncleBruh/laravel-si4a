@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4" bis_skin_checked="1">
                <!--begin::Header-->
                <div class="card-header" bis_skin_checked="1"><div class="card-title" bis_skin_checked="1">Tambah Fakultas</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{ route('fakultas.store')}}" method="POST">
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
                        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
                        <input type="text" class="form-control" name="kaprodi"value={{ old('kaprodi') }}>
                        @error('kaprodi')
                          <div class="text-danger">
                              {{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3" bis_skin_checked="1">
                        <label for="sekretaris" class="form-label">Nama Sekretaris</label>
                        <input type="text" class="form-control" name="sekretaris"value={{ old('sekretaris') }}>
                        @error('sekretaris')
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