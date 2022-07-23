@extends('admin.layouts.main')
@push('style')
<link rel="stylesheet" href="{{asset('assets/admin/vendor/')}}/summernote/summernote-bs4.min.css">
<style>
    .img-upload{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .img-upload img{
        height: 80px;
    }
</style>
@endpush
@push('js')
<script src="{{asset('assets/admin/vendor/')}}/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        $('#summernote').summernote({
            height: 250, 
        });
    });
</script>
@endpush
@section('title','Artikel')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">{{@$result ? 'Edit' : 'Tambah'}} Data Artikel</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/article')}}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
                <br>
                <form action="{{ @$result ? url('admin/article',@$result->id) : url('admin/article') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(@$result)
                        {{ method_field('patch') }}
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Judul<span class="star">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{old('title', @$result->title)}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ringkasan<span class="star">*</span></label>
                                <textarea class="form-control" name="summary" row="40">{{old('summary',@$result->summary)}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Konten<span class="star">*</span></label>
                                <textarea id="summernote" rows="8" name="content">{!!old('content',@$result->content)!!}</textarea>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="inputState" class="form-label">Kategori</label>
                                <select id="inputState" class="form-select" name="category">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach($category as $val_cat)
                                    <option value="{{$val_cat->id}}" {{ old('category',@$result->category) == $val_cat->id ? "selected" : "" }}>{{$val_cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Gambar</label>
                                <div class="img-upload">
                                    @if(@$result)
                                    <img src="{{asset('storage/uploads/article/'.@$result->image)}}" alt="" id="view_image">
                                    @else
                                    <img id="view_image">
                                    @endif
                                </div>
                                <input class="form-control" type="file" name="image" accept="image/*" oninput="view_image.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Thumbnail</label>
                                <div class="img-upload">
                                    @if(@$result)
                                    <img src="{{asset('storage/uploads/article/'.@$result->thumbnail)}}" alt="" id="view_thumbnail">
                                    @else
                                    <img id="view_thumbnail">
                                    @endif
                                </div>
                                <input class="form-control" type="file" name="thumbnail" accept="image/*" oninput="view_thumbnail.src=window.URL.createObjectURL(this.files[0])">
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