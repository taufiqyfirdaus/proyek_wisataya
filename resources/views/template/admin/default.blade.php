<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template.admin.partials.head')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Wisataya</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      
    </header>
    @include('template.admin.partials.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div>
          @yield('title')
        </div>
        <ul class="app-breadcrumb breadcrumb">
          @yield('breadcrumbs')
        </ul>
      </div>
      <div class="row">
        @yield('content')
      </div>
    </main>
    
    @include('template.admin.partials.script')
  </body>
</html>