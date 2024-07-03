<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">  
          <link rel="shortcut icon" href="{{asset('')}}" type="image/x-icon">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">EquipNet</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
      </li>
      @if(Auth::user()->usertype=='1' || Auth::user()->usertype=='0' )
      <li class="menu-item">
        <a
          href="{{route('equipement.index')}}"
          class="menu-link"
        >
        <i class='bx bx-building-house'></i>   
         <div data-i18n="Equipement">Equipements</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="{{route('equipement.indexv')}}"
          class="menu-link"
        >
        <i class='bx bx-building-house'></i>   
         <div data-i18n="Equipement">Equipements Valable</div>
        </a>
      </li>
    
      <li class="menu-item">
           <a
          href="{{route('besoin.index')}}"
          class="menu-link"
        >
        <i class='bx bxs-bookmark-plus'></i>
        <div data-i18n="besoin">Besoins</div>
        </a>
      </li>
      @endif
      <li class="menu-item">
        <a
          href="{{route('maintenance.index')}}"
          class="menu-link"
        >

        <i class='bx bx-wrench'></i>
          <div data-i18n="maintenance">Maintenanaces</div>
        </a>
      </li>
      
      @if(Auth::user()->usertype=="1")
      <li class="menu-item">
        <a
          href="{{route('user.index')}}"
          class="menu-link"
        >
        <i class='bx bx-user'></i>
          <div data-i18n="User">Utilisateurs</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="{{route('map')}}"
          class="menu-link"
        >
        <i class='bx bx-map-alt'></i>
          <div data-i18n="maintenance">Map des Equipements</div>
        </a>
      </li>
      @endif
      
    </ul>
  </aside>