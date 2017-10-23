<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Point</title>
    <link rel="stylesheet" href="./css/bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/tether.min.css">
    <link rel="stylesheet" href="./css/app.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMqoEp4Kw0k4j-m3-KL60rBtOLxZz-Itw&libraries=places" type="text/javascript"></script>
    <script>
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col'><img class='' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }

        function preview_gallery() {
            var total_file = document.getElementById("gallery").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#gallery_preview').append("<div class='col'><img class='' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }

        function preview_marker() {
            var total_file = document.getElementById("markerImage").files.length;
            $('#image_marker').append("<div class='col'><img class='' src='" + URL.createObjectURL(event.target.files[0]) + "'></div>");
        }
    </script>
    <style>
        .blok{
            text-align:center
        }

        a
        {

            margin-left: 20px;
        }
        a:hover
        {
            color:cornflowerblue !important;

        }
        .active{
            color:dodgerblue !important;
        }
        #mapa
        {
            width:100%;
            height:400px;
        }
    </style>



</head>

<body>

<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{url('home')}}">SiAN</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="{{url('insertCity')}}">Add City <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active " href="{{url('points')}}">Add Point <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="{{url('addTrackRoot')}}">Add Track Root <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="{{url('insertCity')}}">Edit City <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="{{url('insertCity')}}">Edit Point <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="{{url('insertCity')}}">Edit Track Root <span class="sr-only">(current)</span></a>
                </li>




                <!-- <li class="nav-item">
                     <a class="nav-link" href="#">Link</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link disabled" href="#">Disabled</a>
                 </li>-->
            </ul>

        </div>
    </nav>


    <div class="row">
        <div class="col">
            <form id="formAddPoint" class="form-control" action="{{ URL::to('points') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="selectCountry">Country</label>
                            <select name="country" class="form-control" id="selectCountry">
                                <option value="Country" disabled selected> Country</option>
                               <?php echo $country;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="selectCity">City</label>
                            <select name="City" class="form-control" id="selectCity">
                                <option disabled selected>City</option>
                                <?php echo $city;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="selectCategory">City</label>
                            <select name="categorry" class="form-control" id="selectCategory">
                                <option value="monument">Monument</option>
                                <option value="caffeRestorants">Coffee Restaurant</option>
                                <option value="funShoping">Fun - Shopping Center</option>
                                <option value="hotelHostel">Hotel & Hostel</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a id="btn-tab-en" class="nav-link active" href="#">EN</a>
                            </li>
                            <li class="nav-item">
                                <a id="btn-tab-sr-lat" class="nav-link" href="#">SR-lat</a>
                            </li>
                            <li class="nav-item">
                                <a id="btn-tab-sr-cir" class="nav-link" href="#">SR-cir</a>
                            </li>
                            <li class="nav-item">
                                <a id="btn-tab-ru" class="nav-link" href="#">RU</a>
                            </li>
                            <li class="nav-item">
                                <a id="btn-tab-fr" class="nav-link" href="#">FR</a>
                            </li>
                            <li class="nav-item">
                                <a id="btn-tab-de" class="nav-link" href="#">DE</a>
                            </li>
                        </ul>
                        <div id="content-en" class="row content activeMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_en">Name-en</label>
                                    <input type="text" class="form-control" id="name_en" placeholder="Name City"
                                           name="name_en">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_en">Information city</label>
                                    <textarea class="form-control" id="description_en" rows="7"
                                              name="description_en"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="content-sr-lat" class="row content hiddenMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_rs_lat">Name-srlat</label>
                                    <input type="text" class="form-control" id="name_rs_lat" placeholder="Name City"
                                           name="name_rs_lat">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_rs_lat">Information city</label>
                                    <textarea class="form-control" id="description_rs_lat" rows="7"
                                              name="description_rs_lat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="content-sr-cir" class="row content hiddenMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_rs_cir">Name</label>
                                    <input type="text" class="form-control" id="name_rs_cir" placeholder="Name City"
                                           name="name_rs_cir">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_rs_cir">Information city</label>
                                    <textarea class="form-control" id="description_rs_cir" rows="7"
                                              name="description_rs_cir"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="content-ru" class="row content hiddenMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_ru">Name</label>
                                    <input type="text" class="form-control" id="name_ru" placeholder="Name City"
                                           name="name_ru">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_ru">Information city</label>
                                    <textarea class="form-control" id="description_ru" rows="7"
                                              name="description_ru"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="content-fr" class="row content hiddenMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_fr">Name</label>
                                    <input type="text" class="form-control" id="name_fr" placeholder="Name City"
                                           name="name_fr">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_fr">Information city</label>
                                    <textarea class="form-control" id="description_fr" rows="7"
                                              name="description_fr"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="content-de" class="row content hiddenMyInput">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_de">Name</label>
                                    <input type="text" class="form-control" id="name_de" placeholder="Name City"
                                           name="name_de">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group activeMyInput">
                                    <label for="description_de">Information city</label>
                                    <textarea class="form-control" id="description_de" rows="7"
                                              name="description_de"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label for="images">Image is basic
                                image</label>
                            <input type="file" class="form-control" id="images" placeholder="Image"
                                   name="file" onchange="preview_images();">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="gallery">Image Gallery - required (Format: .png) </label>
                            <input type="file" class="form-control" id="gallery" placeholder="Gallery"
                                   name="gallery[]" multiple onchange="preview_gallery();">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="markerImage">Marker Image - required(Format: .png)</label>
                            <input type="file" class="form-control" id="markerImage" placeholder="Marker Image"
                                   name="icoImg" onchange="preview_marker();">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="row " id="image_preview">

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row " id="gallery_preview">

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row" id="image_marker">

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="searchMap">Search Location City</label>
                            <input type="text" class="form-control controls" id="pac-input" name="searchMap"
                                   placeholder="Search Location">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="map">
                            <div id="mapa">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="latMap">Lat Coordinate</label>
                                    <input type="text" class="form-control validate" id="lat" name="lat"
                                           placeholder="Lat Coordinate">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lngMap">Lng Coordinate</label>
                                    <input type="text" class="form-control validate" id="lng" name="lng"
                                           placeholder="Lng Coordinate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-10"></div>
                    <div class="btn btn-primary float-left" data-toggle="modal" data-target="#alertSave">
                        Save
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="alertSave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Save </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to save ?
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/tether.min.js"></script>
<script src="./js/bootstrap-4/js/bootstrap.min.js"></script>
<script src="./js/app.js"></script>
<script>

    $(document).ready(function() {
        $('select').material_select();

    });
</script>
<script>

    var marker;
    var lat;
    var lng;

    //kreiranje mape sa pocetnim koordinatama
    var map = new google.maps.Map(document.getElementById('mapa'),
            {
                center:{
                    lat:43.313937,
                    lng:21.859703
                },
                zoom:10
            });

    marker = new google.maps.Marker({
        position:{
            lat:43.313937,
            lng:21.859703
        },
        map:map,
        draggable:true
    });
    lat = marker.getPosition().lat();
    lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);


    google.maps.event.addListener(marker,'dragend', function(){
        lat = marker.getPosition().lat();
        lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });


    var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
    google.maps.event.addListener(searchBox, 'places_changed', function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i = 0; place = places[i]; i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);

        }
        map.fitBounds(bounds);
        map.setZoom(15);
        lat = marker.getPosition().lat();
        lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });

</script>
<script>
    $(document).ready(function () {
        $('#save').click(function () {
//            alert('click');
            $('#formAddPoint').submit();
        });
        $('input#images').click(function () {
//            alert('click');
            $('#image_preview').empty();
        });
        $('input#markerImage').click(function () {
//            alert('click');
            $('#image_marker').empty();
        });
    });
</script>
</body>
</html>