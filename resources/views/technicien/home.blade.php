
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Welcome') }} {{ Auth::user()->name }}
    </h2>
</x-slot>
      <!DOCTYPE html>
  <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <meta name="description" content="" />
  
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  
      <!-- Icons. Uncomment required icon fonts -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  
      <!-- Core CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  
      <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
  
      <!-- Page CSS -->
  
      <!-- Helpers -->
      <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  
      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>
  <body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
              <!-- Menu -->
              <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                  <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                     
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">EquipNet</span>
                  </a>
            
                  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                  </a>
                </div>
            
                <div class="menu-inner-shadow"></div>
            
                <ul class="menu-inner py-1">
                  <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                  </li>
                  <li class="menu-item">
                    <a
                      href="{{route('besoin.index')}}"
                      target="_blank"
                      class="menu-link"
                    >
                    <i class='bx bxs-bookmark-plus'></i>
                    <div data-i18n="besoin">Besoins</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a
                      href="{{route('maintenance.index')}}"
                      target="_blank"
                      class="menu-link"
                    >
                    <i class='bx bx-wrench'></i>
                      <div data-i18n="maintenance">Maintenanaces</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a
                      href="#"
                      target="_blank"
                      class="menu-link"
                    >
                      <div data-i18n="Support"></div>
                    </a>
                  </li>
                </ul>
              </aside>              <!-- / Menu -->
  
              <!-- Layout container -->
              <div class="layout-page">
                  <!-- Navbar -->
                  @include('includes.navbar')
                  <!-- / Navbar -->
  
                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                      <!-- Content -->
                     
                  </div>
                  <!-- Content wrapper -->
              </div>
              <!-- / Layout page -->
          </div>
      </div>
      <!-- / Layout wrapper -->
  
      <!-- Core JS -->
      <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
      <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
      <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
      <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
      <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  
      <!-- Vendors JS -->
      <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
  
      <!-- Main JS -->
      <script src="{{ asset('assets/js/main.js') }}"></script>
  
      <!-- Page JS -->
      <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
  
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
  </html>
  </x-app-layout>