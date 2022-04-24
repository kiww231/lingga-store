@extends('admin.layouts.main')
@section('title','Image Background')
@push('style')
<style>
    .star{
        color:red;
    }
</style>
@endpush
@push('js')
    <script>
        $('#img_header_visible').hide();
        $('#img_event_visible').hide();
        $('#img_attending_visible').hide();
        $('#img_header_visible2').show();
        $('#img_event_visible2').show();
        $('#img_attending_visible2').show();
        var img_header_load = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                $('#img_header_visible').show();
                $('#img_header_visible2').hide();
                var output = document.getElementById('img_header_output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        var img_event_load = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                $('#img_event_visible').show();
                $('#img_event_visible2').hide();
                var output = document.getElementById('img_event_output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        var img_attending_load = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                $('#img_attending_visible').show();
                $('#img_attending_visible2').hide();
                var output = document.getElementById('img_attending_output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        $(document).ready(function() {
            $('[data-rel=popover]').popover({
                html: true,
                trigger: "hover"
            });
        })
    </script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">{{@$result ? 'Edit' : 'Tambah'}} Data Image Background</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/mempelai')}}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
                <br>
                <form action="{{url(@$result ? 'admin/image_background/' . $result->id : 'admin/image_background')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(@$result)
                        @method('PUT')
                    @endif
                    <input type="hidden" name="id_mempelai" value="{{$mempelai->id}}">
                    <input type="hidden" name="panggilan_pria" value="{{$mempelai->panggilan_pria}}">
                    <input type="hidden" name="panggilan_wanita" value="{{$mempelai->panggilan_wanita}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" id="dismiss-popover-preview">
                                    Header 
                                    <a href="#"><i class="mdi mdi-information" data-rel="popover" data-placement="top" data-bs-content="<img src='{{asset('assets/template_001/images/image_header.png')}}' width=200 >"></i></a>
                                    </label>
                                    
                                <div id="img_header_visible">
                                    <img id="img_header_output" height="80"/>
                                </div>
                                @if(@$result->header)
                                    <div id="img_header_visible2">
                                        <img src="{{asset('uploads/image_background/'.@$result->header)}}" height="80" alt="">
                                    </div>
                                @endif
                                <input type="file" name="header" class="form-control" accept="image/*" onchange="img_header_load(event)" {{@$result->header ? '' : 'required'}}>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" id="dismiss-popover-preview">
                                    Event 
                                    <a href="#"><i class="mdi mdi-information" data-rel="popover" data-placement="top" data-bs-content="<img src='{{asset('assets/template_001/images/image_event.png')}}' width=200 >"></i></a>
                                    </label>
                                    
                                <div id="img_event_visible">
                                    <img id="img_event_output" height="80"/>
                                </div>
                                @if(@$result->event)
                                    <div id="img_event_visible2">
                                        <img src="{{asset('uploads/image_background/'.@$result->event)}}" height="80" alt="">
                                    </div>
                                @endif
                                <input type="file" name="event" class="form-control" accept="image/*" onchange="img_event_load(event)" {{@$result->event ? '' : 'required'}}>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" id="dismiss-popover-preview">
                                    Attending 
                                    <a href="#"><i class="mdi mdi-information" data-rel="popover" data-placement="top" data-bs-content="<img src='{{asset('assets/template_001/images/image_attending.png')}}' width=200 >"></i></a>
                                    </label>
                                    
                                <div id="img_attending_visible">
                                    <img id="img_attending_output" height="80"/>
                                </div>
                                @if(@$result->attending)
                                    <div id="img_attending_visible2">
                                        <img src="{{asset('uploads/image_background/'.@$result->attending)}}" height="80" alt="">
                                    </div>
                                @endif
                                <input type="file" name="attending" class="form-control" accept="image/*" onchange="img_attending_load(event)" {{@$result->attending ? '' : 'required'}}>
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