@extends('admin.layouts.main')
@section('title','Mempelai')
@push('style')
<style>
    .star{
        color:red;
    }
</style>
@endpush
@push('js')
    <script>
        $('#img_pria_visible').hide();
        $('#img_wanita_visible').hide();
        $('#img_pria_visible2').show();
        $('#img_wanita_visible2').show();
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                $('#img_pria_visible').show();
                $('#img_pria_visible2').hide();
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        var loadFile2 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                $('#img_wanita_visible').show();
                $('#img_wanita_visible2').hide();
                var output = document.getElementById('output2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">{{@$result ? 'Edit' : 'Tambah'}} Data Mempelai</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/mempelai')}}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
                <br>
                <form action="{{url(@$result ? 'admin/mempelai/' . $result->id : 'admin/mempelai')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(@$result)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label"><b>Data Mempelai</b></label>
                            <div class="mb-3">
                                <label class="form-label">Pangggilan Pria<span class="star">*</span></label>
                                <input type="text" class="form-control" name="panggilan_pria" value="{{old('panggilan_pria', @$result->panggilan_pria)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap Pria<span class="star">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap_pria" value="{{old('nama_lengkap_pria', @$result->nama_lengkap_pria)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Panggilan Wanita<span class="star">*</span></label>
                                <input type="text" class="form-control" name="panggilan_wanita" value="{{old('panggilan_wanita', @$result->panggilan_wanita)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap Wanita<span class="star">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap_wanita" value="{{old('nama_lengkap_wanita', @$result->nama_lengkap_wanita)}}" required>
                            </div>
                            <label class="form-label"><b>Data Orang Tua</b></label>
                            <div class="mb-3">
                                <label class="form-label">Nama Ibu Pria<span class="star">*</span></label>
                                <input type="text" class="form-control" name="ibu_pria" value="{{old('ibu_pria', @$result->ibu_pria)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Ayah Pria<span class="star">*</span></label>
                                <input type="text" class="form-control" name="ayah_pria" value="{{old('ayah_pria', @$result->ayah_pria)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Ibu Wanita<span class="star">*</span></label>
                                <input type="text" class="form-control" name="ibu_wanita" value="{{old('ibu_wanita', @$result->ibu_wanita)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Ayah Wanita<span class="star">*</span></label>
                                <input type="text" class="form-control" name="ayah_wanita" value="{{old('ayah_wanita', @$result->ayah_wanita)}}" required>
                            </div>
                            <label class="form-label"><b>Data Pribadi</b></label>
                            <div class="mb-3">
                                <label class="form-label">Alamat<span class="star">*</span></label>
                                <textarea class="form-control" name="alamat" rows="5" required>{{old('alamat', @$result->alamat)}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram Pria</label>
                                <input type="text" class="form-control" name="ig_pria" value="{{old('ig_pria', @$result->ig_pria)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram Wanita</label>
                                <input type="text" class="form-control" name="ig_wanita" value="{{old('ig_wanita', @$result->ig_wanita)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Pria<span class="star">*</span></label>
                                <div id="img_pria_visible">
                                    <img id="output" height="80"/>
                                </div>
                                @if(@$result)
                                    <div id="img_pria_visible2">
                                        <img src="{{asset('uploads/mempelai/'.@$result->foto_pria)}}" height="80" alt="">
                                    </div>
                                @endif
                                <input type="file" name="foto_pria" class="form-control" accept="image/*" onchange="loadFile(event)" {{@$result->foto_pria ? '' : 'required'}}>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Wanita<span class="star">*</span></label>
                                <div id="img_wanita_visible">
                                    <img id="output2" height="80"/>
                                </div>
                                @if(@$result)
                                    <div id="img_wanita_visible2">
                                        <img src="{{asset('uploads/mempelai/'.@$result->foto_wanita)}}" height="80" alt="">
                                    </div>
                                @endif
                                <input type="file" name="foto_wanita" class="form-control" accept="image/*" onchange="loadFile2(event)" {{@$result->foto_pria ? '' : 'required'}}>
                            </div>
                        </div> 
                        <!-- end col -->
                        <div class="col-lg-6">
                            <label class="form-label"><b>Tanggal dan Waktu</b></label>
                            <div class="mb-3">
                                <label class="form-label">Hari Akad<span class="star">*</span></label>
                                <input type="text" class="form-control" name="hari_akad" value="{{old('hari_akad', @$result->hari_akad)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Akad<span class="star">*</span></label>
                                <input class="form-control" id="example-date" type="date" name="tgl_akad" value="{{old('tgl_akad', @$result->tgl_akad)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Mulai Akad<span class="star">*</span></label>
                                <input class="form-control" id="example-time" type="time" name="waktu_mulai_akad" value="{{old('waktu_mulai_akad', @$result->waktu_mulai_akad)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Selesai Akad<span class="star">*</span></label>
                                <input class="form-control" id="example-time" type="time" name="waktu_selesai_akad" value="{{old('waktu_selesai_akad', @$result->waktu_selesai_akad)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hari Resepsi</label>
                                <input type="text" class="form-control" name="hari_resepsi" value="{{old('hari_resepsi', @$result->hari_resepsi)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Resepsi</label>
                                <input class="form-control" id="example-date" type="date" name="tgl_resepsi" value="{{old('tgl_resepsi', @$result->tgl_resepsi)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Mulai Resepsi</label>
                                <input class="form-control" id="example-time" type="time" name="waktu_mulai_resepsi" value="{{old('waktu_mulai_resepsi', @$result->waktu_mulai_resepsi)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Selesai Resepsi</label>
                                <input class="form-control" id="example-time" type="time" name="waktu_selesai_resepsi" value="{{old('waktu_selesai_resepsi', @$result->waktu_selesai_resepsi)}}">
                            </div>
                            <label class="form-label"><b>Data Tambahan</b></label>
                            <div class="mb-3">
                                <label class="form-label">Url Map<span class="star">*</span></label>
                                <textarea class="form-control" name="map" rows="5" required>{{old('map', @$result->map)}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="example-select" class="form-label">Rekening</label>
                                <div class="col-4">
                                    <input type="text" placeholder="Masukan Nama Bank" class="form-control" name="nama_bank" value="{{old('nama_bank', @$result->nama_bank)}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="number" placeholder="Masukan No Rekening" class="form-control" name="rekening" value="{{old('rekening', @$result->rekening)}}">
                            </div>
                            <div class="mb-3">
                                <label for="example-select" class="form-label">e-Wallet</label>
                                <div class="col-4">
                                    <input type="text" placeholder="Masukan Nama e-Wallet" class="form-control" name="nama_e_wallet" value="{{old('nama_e_wallet', @$result->nama_e_walet)}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="number" placeholder="Masukan No e-Wallet" class="form-control" name="e_wallet" value="{{old('e_wallet', @$result->e_wallet)}}">
                            </div>
                                
                        </div> <!-- end col -->
                        <div class="flex-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                    </div>
                </form>
                <!-- end row-->                      
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
@endsection