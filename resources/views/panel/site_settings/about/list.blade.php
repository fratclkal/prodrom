@extends('panel.layouts.master')
@section('title', 'Site')
@section('headingTitle','Hakkımızda')
@section('content')

    <!-- About Create -->
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
                            <form action="{{route('about.createAbout')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Başlık:</label>
                                            <input type="text" class="form-control" id="request_code" name="title" placeholder="Başlık">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="roundText">Açıklama</label>
                                            <textarea name="description" id="summernote"></textarea>
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

    <!-- About List -->
    <section class="row">
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
                                    <th class="col-md-5">Başlık</th>
                                    <th class="col-md-5">İçerik</th>
                                    <th class="col-md-2">Güncelle</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($about as $abouts)
                                    <tr>
                                        <td>{{$abouts -> title}}</td>
                                        <td>{!! substr($abouts -> description,0,200) !!}...</td>
                                        <td>
                                            <button class="btn btn-warning" onclick="updateModal({{$abouts -> id}})"  ><i class="bi bi-pencil-square"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Update -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hakkımızda Güncelle</h5>
                    <button onclick="updateModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('about.updateAbout')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="hiddenInput" name="hiddenInput" placeholder="Ad"  required>
                                <div class="form-group">
                                    <label for="basicInput">Başlık:</label>
                                    <input type="text" class="form-control" id="titleModal" name="title" placeholder="Telefon Numarası" required>
                                </div>
                                <div class="form-group">
                                    <label for="roundText">Açıklama</label>
                                    <textarea class="form-control" name="description" id="descriptionModal"></textarea>
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
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpanel/assets/vendors/summernote/summernote-lite.min.css')}}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('adminpanel/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminpanel/assets/vendors/summernote/summernote-lite.min.js')}}"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 220,
        })
    </script>
    <script>
        function toggleModal(){
            $('#exampleModal').modal('toggle');
        }

        function updateModal(id){

            $.ajax({
               url :'{{route('about.fetchModalAbout')}}',
               type :'GET',
               data :{
                   id:id
               },
                success:(response)=>{
                   document.getElementById('hiddenInput').value = response.id;
                   document.getElementById('titleModal').value = response.title;
                   document.getElementById('descriptionModal').value = response.description;
                   $('#updateModal').modal('toggle');
                }
            });
        }

    </script>
@endsection
