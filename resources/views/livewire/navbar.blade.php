<div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <!--<a class="navbar-brand" href="#"><i class="fab fa-linkedin fa-2x"></i></a>-->

            <!-- Profile dropdown -->
            @if (auth()->check())
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('img/image_admin.jpg') }}" alt="Avatar"
                            class="avatar img-fluid rounded-circle" width="40" height="40">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item">Settings</a></li>
                        <li><a wire:click="logout" class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            @else
                <a href='/login'><button class="btn btn-secondary">AREA RISERVATA</button></a>
            @endif

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column text-center {{ Request::is('/') ? 'active' : '' }}"
                            aria-current="page" href="/"><i class="fas fa-home fa-lg"></i><span
                                class="small">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column text-center {{ Request::is('classifica') ? 'active' : '' }}"
                            aria-current="page" href="/classifica"><i class="fas fa-ranking-star fa-lg"></i><span
                                class="small">Classifica</span></a>
                    </li>
                    <li class="nav-item">
                        @if (auth()->check())
                            @if ($check_creazione->risultato == 'true')
                                <a wire:click="creaGironi" class="nav-link d-flex flex-column text-center"
                                    aria-current="page"><i class="fas fa-volleyball fa-lg"></i><span
                                        class="small">Creazione
                                        Campionato Attivo</span></a>
                            @elseif($check_creazione->risultato == 'false')
                                <a data-toggle="tooltip" data-placement="top"
                                    class="nav-link d-flex flex-column text-center disable" aria-current="page"><i
                                        class="fas fa-volleyball fa-lg"></i><span class="small">Creazione
                                        Campionato Disabilitato</span></a>

                                <!-- Modal PopUP -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h3 class="modal-title"><b>ERRORE!</b></h3>
                                                <button type="button" onclick="closePopup()" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <b style="color: rgb(179, 12, 12)">CAMPIONATO GIA CREATO DALL'ADMIN!</b>
                                            </div>

                                            <!-- Modal Footer -->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            @endif
                        @endif
                    </li>
                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-column text-center" aria-current="page" href="/squadre"><i
                                    class="fas fa-solid fa-shirt fa-lg"></i><span class="small">Modifica
                                    Squadre</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-column text-center" aria-current="page" href="/log"><i
                                    class="fa-solid fa-file fa-lg"></i><span class="small">Log</span></a>
                        </li>
                    @endif
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

    <script>
        document.querySelector('.nav-link.d-flex.flex-column.text-center.disable').addEventListener('click', function(
            event) {
            event.preventDefault(); // Evita il comportamento predefinito del link
            document.getElementById('myModal').style.display = 'block';
        });

        // Funzione per chiudere il popup
        function closePopup() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>


</div>
