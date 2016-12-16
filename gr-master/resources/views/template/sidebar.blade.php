<div class="sidebar" data-color="green" data-image="/assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                Serre
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ route('dashboard')  }}">
                    <i class="pe-7s-graph"></i>
                    <p>Tableau de bord</p>
                </a>
            </li>
            <li>
                <a href="{{ route('serre.index') }}">
                    <i class="pe-7s-home"></i>
                    <p>Gestion des serres</p>
                </a>
            </li>
            <li>
                <a href="{{ route('climat.index') }}">
                    <i class="pe-7s-cloud"></i>
                    <p>Gestion des climats</p>
                </a>
            </li>
            <li>
                <a href="{{ route('zone.index') }}">
                    <i class="pe-7s-map-2"></i>
                    <p>Gestion des zones</p>
                </a>
            </li>
            <li class="dropdown">
                <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="pe-7s-map-2"></i>
                    <p>Les traitements</p>
                </a>
                <ul class="dropdown-menu" style="color: #000;">
                    <li><a href="{{ route('chauffage.index') }}">Chauffage
                        </a></li>
                    <li><a href="{{ route('ventilation.index') }}">Ventilation
                        </a></li>
                    <li><a href="{{ route('photosynthese.index') }}">Photosynthése
                        </a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>