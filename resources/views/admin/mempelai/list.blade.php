@extends('admin.layouts.main')
@push('style')
    <link href="{{asset('assets/admin')}}/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin')}}/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin')}}/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin')}}/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
    <script src="{{asset('assets/admin')}}/js/vendor/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/buttons.html5.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/buttons.flash.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/buttons.print.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/dataTables.keyTable.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/vendor/dataTables.select.min.js"></script>
    <!-- <script src="{{asset('assets/admin')}}/js/pages/demo.toastr.js"></script> -->
    <script>
        az = {
            delete : function(id){
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data Mempelai akan dihapus",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    buttonsStyling: true
                }).then(function(result) {
                    if(result['isConfirmed']){
                        $.ajax({
                            url: "{{url('admin/mempelai')}}/" + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function(data){
                                if(data == 'success'){
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Data Mempelai Berhasil dihapus'
                                    })
                                    window.setTimeout(function(){location.reload()},2000)
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Data Mempelai Gagal dihapus'
                                    })
                                }
                            }
                        });
                    }
                })
            }
        }
        $(document).ready(function(){
            "use strict";
            $("#datatable-buttons").DataTable({
                lengthChange:!1,
                language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",
                next:"<i class='mdi mdi-chevron-right'>"}},
                drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        });
        $('#switch2').click(function () {
            var triger = document.getElementById("switch2");
            var id = $(this).attr("data-id");
            var status = '';
            if (triger.checked) {
                var status = 1;
            }else{
                var status = 0;
            }
            $.ajax({
                url: "{{url('admin/mempelai/status')}}/"+id+"/"+status,
                type: 'GET',
                success: function(data){
                    if(data == 'success'){
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Merubah Status Mempelai'
                        })
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal Merubah Status Mempelai'
                        })
                    }
                }
            })
        });
    </script>
@endpush
@section('title','Mempelai')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <script>
                        Toast.fire({
                            icon: 'success',
                            title: "{{ session('success') }}"
                        })
                    </script>
                @elseif (session('errors'))
                    <script>
                        Toast.fire({
                            icon: 'error',
                            title: "{{ session('errors') }}"
                        })
                    </script>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="header-title">Data Mempelai</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{url('admin/mempelai/create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                </div>
                <br>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">No</th>
                            <th class="text-center">Mempelai</th>
                            <th class="text-center">Akad</th>
                            <th class="text-center">Resepsi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no=1)
                        @foreach($data as $value)
                        <tr>
                            <td class="text-center">
                                <a href="{{url('admin/mempelai/' . $value->id . '/edit')}}" class="btn btn-sm btn-primary"><i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="az.delete('{{$value->id}}')"><i class="mdi mdi-delete-forever"></i></a>
                            </td>
                            <td class="text-center">{{$no++}}</td>
                            <td><a href="{{url('wedding'.$value->url)}}" target="_blank">{{$value->panggilan_pria . ' & ' . $value->panggilan_wanita}}</a></td>
                            <td>{{$value->hari_akad}}, {{date('d-m-Y', strtotime($value->tgl_akad))}}</td>
                            <td>
                                @if($value->hari_resepsi && $value->tgl_resepsi)
                                    {{$value->hari_resepsi}}, {{date('d-m-Y', strtotime($value->tgl_resepsi))}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <input type="checkbox" id="switch2" {{$value->status == 1 ? 'checked' : ''}} data-switch="primary" data-id="{{$value->id}}"/>
                                <label for="switch2" data-on-label="On" data-off-label="Off"></label>
                            </td>
                            <td class="text-center">
                                <a href="{{url('admin/gallery/' . $value->id . '/edit')}}" class="btn btn-sm btn-primary"><i class="mdi mdi-image-multiple"></i> Gallery</a>
                                <a href="{{url('admin/image_background/' . $value->id . '/edit')}}" class="btn btn-sm btn-primary"><i class="mdi mdi-image"></i> Image Background</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection