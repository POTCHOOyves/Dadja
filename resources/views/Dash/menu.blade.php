<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('TableauBord')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('Utilisateurs')}}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Poste')}}">
                        <i class="bi bi-circle"></i><span>Poste</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Departement')}}">
                        <i class="bi bi-circle"></i><span>Départements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#courrier" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Gestion des courriers</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="courrier" class="nav-content collapse " data-bs-parent="#courrier">
                <li>
                    <a href="{{route('TypeCourrier')}}">
                        <i class="bi bi-circle"></i><span>Type de courriers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('VoieTransmission')}}">
                        <i class="bi bi-circle"></i><span>Voies de transmission</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-na" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Ajout de courrier</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-na" class="nav-content collapse " data-bs-parent="#sidebar-na">
                <li>
                    <a href="{{route('Courriers_Entrants')}}">
                        <i class="bi bi-circle"></i><span>Courrier à une personne</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Courriers_Groupes')}}">
                        <i class="bi bi-circle"></i><span>Courrier à un département</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('Bordereau_Entrants')}}">
                <i class="bi bi-envelope"></i>
                <span>Liste des Courriers</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('MesCourriers')}}">
                <i class="bi bi-envelope"></i>
                <span>Mes Courriers physiques</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#electronique" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Courrier Electronique</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="electronique" class="nav-content collapse " data-bs-parent="#sidebar-na">
                <li>
                    <a href="{{route('SendCourrier')}}">
                        <i class="bi bi-circle"></i><span>Envoyer un courrier</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('MailBox')}}">
                        <i class="bi bi-circle"></i><span>Boîte de réception</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('SendBox')}}">
                        <i class="bi bi-circle"></i><span>Boîte d'envoi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

    </ul>

</aside><!-- End Sidebar-->
