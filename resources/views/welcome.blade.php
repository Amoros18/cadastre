@include('header')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}">
<div class="container-fluid d-block m-0 p-0 h-100">
    <div class="container-fluid p-0 m-0" id="banner">
        <img src="{{ asset('img/banner.png') }}" width="100%">
    </div>
    <div class="container-fluid w-100 p-0 m-0" id="contain">
        <!-- First Row -->
        <div class="container-fluid d-flex justify-content-center row m-0 " id="first-row">
            <div class="col-md"></div>
            <!-- Bureau du chef -->
            <div class="col">
                <a class="container rectangle2" id="chef" href="{{route('statistique')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img src="{{asset('img/OfficeChairIcon.png')}}">
                    </div>
                    <p class="bureau">Bureau du Chef</p>
                </a>
            </div>

            <!-- BAG -->
            <div class="col my-2 mt-md-0">
                <a class="container rectangle2" id="bag" href="{{route('user.bag')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img src="{{asset('img/Printer.png')}}">
                    </div>
                    <p class="bureau">&nbsp;Bureau des Affaires Generales&nbsp;</p>
                </a>
            </div>

            <!-- BMJ -->
            <div class="col my-2 mt-md-0">
                <a class="container rectangle2" id="bmj" href="{{route('user.bmj')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img src="{{asset('img/Update.png')}}">
                    </div>
                    <p class="bureau">Bureau des Mises a Jour</p>
                </a>
            </div>
            <div class="col-md"></div>
        </div>

        <!-- Second Row -->
        <div class="container-fluid d-flex justify-content-center row ms-0 mt-md-4" id="second-row">
            <div class="col-md"></div>
            <!-- Bureau du controle -->
            <div class="col my-2 mt-md-0">
                <a class="container p-0 rectangle2" id="bc" href="{{route('user.bc')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img class="" src="{{asset('img/ProtectIcon2.png')}}">
                    </div>
                    <p class="bureau">Bureau de Controle</p>
                </a>
            </div>

            <!-- Geometre -->
            <div class="col my-2 mt-md-0">
                <a class="container p-0 rectangle2" id="geometre" href="{{route('user.geometre')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img class="" src="{{asset('img/tripod.png')}}">
                    </div>
                    <p class="bureau">Geometre</p>
                </a>
            </div>

            <!-- Archivages -->
            <div class="col my-2 mt-md-0">
                <a class="container  p-0 rectangle2 bg-light" id="archive" href="{{route('user.archivage')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img class="" src="{{asset('img/WinrarIcon.png')}}">
                    </div>
                    <p class="bureau">Archivages</p>
                </a>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
</div>