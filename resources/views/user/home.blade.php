
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
            @include('includes.barmenu')
            <!-- / Menu -->
  
              <!-- Layout container -->
              <div class="layout-page">
                  <!-- Navbar -->
                  @include('includes.navbar')
                  <!-- / Navbar -->
  
                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                    <!DOCTYPE html>
                    <html lang="en">
                    
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Admin Dashboard</title>
                        <!-- ======= Styles ====== -->
                        <link rel="stylesheet" href="{{asset('css/stylee.css')}}">
                    </head>
                    
                    <body>
                        <!-- =============== Navigation ================ -->
                        <div class="container">
                                <!-- ======================= Cards ================== -->
                                <div class="cardBox">
                                    <div class="card">
                                        <div>
                                            <div class="numbers">{{$equipements}}</div>
                                            <div class="cardName">Nombre des equipements</div>
                                        </div>
                    
                                        <div class="iconBx">
                                            <ion-icon name="tv-outline"></ion-icon>
                                        </div>
                                    </div>
                    
                                    <div class="card">
                                        <div>
                                            <div class="numbers">{{$besoins}}</div>
                                            <div class="cardName">Nombre des Besoins</div>
                                        </div>
                    
                                        <div class="iconBx">
                                            <ion-icon name="clipboard-outline"></ion-icon>                    </div>
                                    </div>
                    
                                    <div class="card">
                                        <div>
                                            <div class="numbers">{{$maintenances}}</div>
                                            <div class="cardName">Nombre des maintenances</div>
                                        </div>
                    
                                        <div class="iconBx">
                                            <ion-icon name="construct-outline"></ion-icon>                    </div>
                                    </div>
                    
                                    <div class="card">
                                        <div>
                                            <div class="numbers">{{$bureau}}</div>
                                            <div class="cardName">Numero de bureau</div>
                                        </div>
                    
                                        <div class="iconBx">
                                            <ion-icon name="person-outline"></ion-icon>                    </div>
                                    </div>
                                </div>
                                    <div class="recentCustomers">
                                        <div class="cardHeader">
                                            <h2>Equipements valable</h2>
                                        </div>
                    
                                        <table>
                                            @foreach($equipValable as $equip)
                                            <tr>
                                                <td width="60px">
                                                    <div class="imgBx"><img src="{{asset($equip->image)}}" alt=""></div>
                                                </td>
                                                <td>
                                                    <h4>{{$equip->id}}<br> <span>{{$equip->marque}}</span></h4>
                                                </td>
                                            </tr>
                    
                                           @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ====== ionicons ======= -->
                        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                    
                      
                    </body>
                    
                    </html>                     
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