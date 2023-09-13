<!DOCTYPE html>
<html lang="en">
    @include('frontend.includes.head')

      <body>

        <!-- Navigation -->
        @include('frontend.includes.navbar')

        <!-- Page Content -->
        @yield('main')

        <!-- Footer -->
        {{-- @include('frontend.includes.footer') --}}

        <!-- Bootstrap core JavaScript -->
        @include('frontend.includes.script')

      </body>

      </html>

