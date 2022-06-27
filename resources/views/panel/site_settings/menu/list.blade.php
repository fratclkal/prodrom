@extends('panel.layouts.master')
@section('title', 'Site')
@section('headingTitle','Menü')
@section('content')

    <!-- Menu Create -->
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible show fade" style="margin: 10px 25px 10px 25px;">
                                    <li>{{ $error }}</li>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('menu.createMenu')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Menü İsmi:</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Menü İsmi">
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="basicInput">Statü</label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <option>Pasif</option>
                                                    <option>Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="basicInput">Menü Linki</label>
                                                <input type="text" class="form-control" id="link" name="link" placeholder="Menü Linki">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="checkbox" class="input border mr-2" name="is_planned" id="is_planned" value="0" checked hidden> <label class="cursor-pointer select-none" for="is_planned" hidden>Planlanacak</label>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary me-3 mb-1">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu List -->
    <!--<section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hakkımızda Bilgileri</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                <tr>
                                    <th class="col-md-5">Menü İsmi</th>
                                    <th class="col-md-2">Güncelle</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-warning" onclick="updateModal()"  ><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" onclick="deleteRow()"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Menu Update -->
    <!--<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menü Güncelle</h5>
                    <button onclick="updateModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="hiddenInput" name="hiddenInput" placeholder="Ad"  required>
                                <div class="form-group">
                                    <label for="basicInput">Menü İsmi:</label>
                                    <input type="text" class="form-control" id="menuModal" name="menu" placeholder="Menü İsmi" " required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="updateModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>-->

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpanel/assets/vendors/summernote/summernote-lite.min.css')}}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('adminpanel/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminpanel/assets/vendors/summernote/summernote-lite.min.js')}}"></script>



    <script>
        function toggleModal(){
            $('#exampleModal').modal('toggle');
        }

        {{--function updateModal(id){--}}

        {{--    $.ajax({--}}
        {{--        url :'{{route('menu.fetchModalMenu')}}',--}}
        {{--        type :'GET',--}}
        {{--        data :{--}}
        {{--            id:id--}}
        {{--        },--}}
        {{--        success:(response)=>{--}}
        {{--            document.getElementById('hiddenInput').value = response.id;--}}
        {{--            document.getElementById('menuModal').value = response.menu;--}}
        {{--            $('#updateModal').modal('toggle');--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        {{--function deleteRow(id){--}}
        {{--    Swal.fire({--}}
        {{--        'icon':'warning',--}}
        {{--        'title':'Emin Misiniz ?',--}}
        {{--        'text':'Silinen Kullanıcı Geri Getirelemez.',--}}
        {{--        showConfirmButton: true,--}}
        {{--        showCancelButton: true,--}}
        {{--        confirmButtonText:'Sil',--}}
        {{--        cancelButtonText:'İptal',--}}
        {{--    }).then((response)=>{--}}
        {{--        if(response.isConfirmed){--}}
        {{--            $.ajax({--}}
        {{--                url:'{{route('menu.remove')}}',--}}
        {{--                type:'POST',--}}
        {{--                data:{--}}
        {{--                    id:id,--}}
        {{--                    "_token":'{{ csrf_token() }}',--}}
        {{--                },--}}
        {{--                success:()=> {--}}
        {{--                    window.location.reload();--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

    </script>
@endsection
