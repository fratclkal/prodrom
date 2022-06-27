@extends('panel.layouts.master')
@section('title', 'Site')
@section('headingTitle','Site İletişim Yönetimi')
@section('content')
{{--    @if(session('addWebContactSuccess'))--}}
{{--        <script>--}}
{{--            Swal.fire({--}}
{{--                position: 'top-enter',--}}
{{--                icon: 'success',--}}
{{--                title: '{{(session('addWebContactSuccess'))}}',--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 1500--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endif--}}
    <style>
        #map-canvas{
            width: 350px;
            height: 250px;
        }
    </style>
    <!-- Contact Create -->
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>İletişim Güncelleme</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->count()>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <div class="container px-5 my-5">
                                    <form id="contactForm" action="{{route('contact.updateContact')}}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="address" name="address" type="text" placeholder="Adres" style="height: 4rem;" value="{{$contact -> address}}"  data-sb-validations="required"></input>
                                            <label for="adres">Adres</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email" placeholder="Email Adres" value="{{$contact -> email}}" data-sb-validations="required,email" />
                                            <label for="emailAdres">Email Adres</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="phone_num" name="phone_num" type="tel"  value="{{$contact -> phone_num}}" placeholder="Telefon" data-sb-validations="required" />
                                            <label for="telefon">Telefon</label>
                                        </div>
                                        <label for="exampleInputEmail1">Harita</label>
                                        <div id="map" style="height: 300px; width: 100%"></div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Enlem</label>
                                                    <input  id="lat" name="lat" value="{{$contact -> lat}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Boylam</label>
                                                    <input  id="lng" name="lng" value="{{$contact -> lng}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-12 col-12">
                                                <button class="btn btn-primary float-end" id="submitButton" type="submit">Ekle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact List -->
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
                                <th class="col-md-5">Telefon Numarası</th>
                                <th class="col-md-5">Email</th>
                                <th class="col-md-2">Adres</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="updateModal()"  ><i class="bi bi-pencil-square"></i></button>
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


@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm6W2eLH449DgLTpoKGFsKO_gK20zcUUo&libraries=place" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUjAm2tPoJgyjFKXd8Q0hkF2dgffg5tn4&callback=initMap"
            async defer></script>
    <script>
        function initMap() {
            var myLatLng = {lat: 38.68213, lng: 39.17709};
            var latInput = document.getElementById("lat");
            var lngInput = document.getElementById("lng");
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'drag', function (event) {
                latInput.value = event.latLng.lat();
                lngInput.value = event.latLng.lng();
            });
        }
    </script>
@endsection
