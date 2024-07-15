@include('header')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid d-block m-0 p-0 h-100" id='content'>
    
    <div class="container-fluid w-100 m-0" id="contain">
        <!-- Recherche button -->
        <div class="container-fluid d-flex justify-content-center row m-0 ">
            <div class="col-md col-lg-5 ms-lg-3"></div>
            <a class="col ms-lg-3 btn btn-light w-100 text-decoration-none" href="{{route('liste.recherche')}}"><i class="fa fa-fw fa-search"></i> Rechercher un dossier</a>
            <div class="col-md col-lg-1  ms-lg-3"></div>
        </div>

        <!-- First Row -->
        <div class="container-fluid d-flex justify-content-center row m-0 " id="first-row">
            <div class="col-md col-lg-5 ms-lg-4"></div>
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
                <a class="container rectangle2" id="bag" href="{{route('create.ouverture-dossier')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img src="{{asset('img/Printer.png')}}">
                    </div>
                    <p class="bureau">&nbsp;Bureau des Affaires Generales&nbsp;</p>
                </a>
            </div>

            <!-- BMJ -->
            <div class="col my-2 mt-md-0">
                <a class="container rectangle2" id="bmj" href="{{route('liste.mj')}}">
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
            <div class="col-md col-lg-5 ms-lg-4"></div>
            <!-- Bureau du controle -->
            <div class="col my-2 mt-md-0">
                <a class="container p-0 rectangle2" id="bc" href="{{route('liste.controle1')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img class="" src="{{asset('img/ProtectIcon2.png')}}">
                    </div>
                    <p class="bureau">Bureau de Controle</p>
                </a>
            </div>

            <!-- Geometre -->
            <div class="col my-2 mt-md-0">
                <a class="container p-0 rectangle2" id="geometre" href="{{route('liste.ccp-intro')}}">
                    <div class="container-fluid justify-content-center d-flex flex-wrap align-content-center icons8_off">
                        <img class="" src="{{asset('img/tripod.png')}}">
                    </div>
                    <p class="bureau">Geometre</p>
                </a>
            </div>

            <!-- Archivages -->
            <div class="col my-2 mt-md-0">
                <a class="container  p-0 rectangle2 bg-light" id="archive" href="{{route('liste.archivage-intro')}}">
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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/dataTables.js')}}"></script>



@if (session('unauthorized'))
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Acces non authorisé</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Vous avez tenté d'accéder à un espace qui ne vous est pas reservé ! <br>
                Merci de rester dans le cadre de travail qui vous a été associé.
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="dismissModal()">J'ai compris</button>
            </div>

            </div>
        </div>
    </div>
    <script>
        function dismissModal(){
                $("#myModal").hide();
            }
        $(document).ready(function(){
            $("#myModal").show();
        });
    </script>    
@endif