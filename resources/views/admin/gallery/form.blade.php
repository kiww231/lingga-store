@extends('admin.layouts.main')
@section('title','Gallery')
@push('style')
<style>
    .star{
        color:red;
    }
</style>
@endpush
@push('js')
    <!-- Dropzone js -->
    <script src="{{asset('assets/admin')}}/js/vendor/dropzone.min.js"></script>
    <!-- File upload js -->
    <script src="{{asset('assets/admin')}}/js/ui/component.fileupload.js"></script>
    <script>
        az = {
            delete : function(id){
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Foto akan dihapus",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    buttonsStyling: true
                }).then(function(result) {
                    if(result['isConfirmed']){
                        $.ajax({
                            url: "{{url('admin/gallery')}}/" + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function(data){
                                if(data == 'success'){
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Foto Berhasil dihapus'
                                    })
                                    // window.setTimeout(function(){location.reload()},2000)
                                    getDataGallery();
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Foto Gagal dihapus'
                                    })
                                }
                            }
                        });
                    }
                })
            }
        }

        $(document).ready(function(){
            getDataGallery();
        })

        function getDataGallery() {
            var id = '{{$result->id}}';
            var asset = '{{asset("uploads/gallery")}}/';
            jQuery("#dataGallery").html('loading..');
            var exchange = '';
            $.ajax({
                url: '{{url("admin/gallery")}}/' + id,
                type: 'GET',
                success: function (res) {
                    jQuery("#dataGallery").html('');
                    $.each(res, function (key, val) {
                        exchange = '<div class="card mt-1 mb-0 shadow-none border"> <div class="p-2"> <div class="row align-items-center">' +
                                    '<div class="col-auto">' +
                                    '<img data-dz-thumbnail src="'+asset + val.image+'" class="avatar-sm rounded bg-light" alt="">' +
                                    '</div>' + 
                                    '<div class="col ps-0">' +
                                    '<a href="#" class="text-muted fw-bold" data-dz-name>'+val.image+'</a>' +
                                    '<p class="mb-0" data-dz-size>uploaded</p>' +
                                    '</div>' +
                                    '<div class="col-auto">' +
                                    '<a href="#" onclick="az.delete('+val.id+')" class="btn btn-link btn-lg text-muted" data-dz-remove>' +
                                    '<i class="dripicons-cross"></i>' +
                                    '</a>' +
                                    '</div>' +
                                    '</div></div></div>';
                        $("#dataGallery").append(exchange);
                    });
                }
            })
        }
    </script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">Gallery</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/mempelai')}}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
                <br>
                <!-- File Upload -->
                <form action="{{url('admin/gallery')}}" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"  data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                    @csrf
                    <input type="hidden" name="id_mempelai" value="{{@$result->id}}">
                    <input type="hidden" name="panggilan_pria" value="{{@$result->panggilan_pria}}">
                    <input type="hidden" name="panggilan_wanita" value="{{@$result->panggilan_wanita}}">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Drop files here or click to upload.</h3>
                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                            <strong>not</strong> actually uploaded.)</span>
                    </div>
                </form>

                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>

                <!-- file preview template -->
                <div class="d-none" id="uploadPreviewTemplate">
                    <div class="card mt-1 mb-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                </div>
                                <div class="col ps-0">
                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                    <p class="mb-0" data-dz-size></p>
                                </div>
                                <div class="col-auto">
                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                        <!-- <i class="dripicons-cross"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="dataGallery"></div>
                
                <!-- end row-->                      
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
@endsection