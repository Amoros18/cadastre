@include('header')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}">

<div class="container-fluid w-100" id="contain">
    <!-- First Row -->
    <div class="container d-flex justify-content-center" id="first-row">
        <!-- Bureau du chef -->
        <a class="container m-0 p-0 rectangle2" href="{{route('user.chef')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img src="{{asset('img/OfficeChairIcon.png')}}">
            </div>
            <p class="bureau">Bureau du Chef</p>
        </a>

        <!-- BAG -->
        <a class="container m-0 ms-5 p-0 rectangle2" href="{{route('user.bag')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img class="" src="{{asset('img/PrinterIcon.png')}}">
            </div>
            <p class="bureau">Bureau des Affaires Generales</p>
        </a>

        <!-- BMJ -->
        <a class="container m-0 ms-5 p-0 rectangle2" href="{{route('user.bmj')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img src="{{asset('img/UpdateLeftRotationIcon.png')}}">
            </div>
            <p class="bureau">Bureau des Mises a Jour</p>
        </a>
    </div>

    <!-- Second Row -->
    <div class="container d-flex justify-content-center" id="second-row">
        <!-- Bureau du controle -->

        <a class="container m-0 p-0 rectangle2" href="{{route('user.bc')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img class="" src="{{asset('img/ProtectIcon.png')}}">
            </div>
            <p class="bureau">Bureau de Controle</p>
        </a>

        <!-- Geometre -->
        <a class="container m-0 ms-5 p-0 rectangle2" href="{{route('user.geometre')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img class="" src="{{asset('img/DrawingCompassIcon.png')}}">
            </div>
            <p class="bureau">Geometre</p>
        </a>

        <!-- Archivages -->
        <a class="container m-0 ms-5 p-0 rectangle2" href="{{route('user.archivage')}}">
            <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                <img class="" src="{{asset('img/WinrarIcon.png')}}">
            </div>
            <p class="bureau">Archivages</p>
        </a>
    </div>
</div>