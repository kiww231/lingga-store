@extends('admin.layouts.main')
@section('title','Mempelai')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">{{@$result ? 'Edit' : 'Tambah'}} Data Feature</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/feature')}}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
                <br>
                <form action="{{url(@$result ? 'admin/feature/' . $result->id : 'admin/feature')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(@$result)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Judul<star>*</star></label>
                                <input type="text" class="form-control" name="title" value="{{old('title', @$result->title)}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Icon<star>*</star></label>
                                <input type="text" class="form-control" name="icon" value="{{old('icon', @$result->icon)}}" required>
                            </div>
                        </div> 
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