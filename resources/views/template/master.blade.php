<!doctype html>
<html lang="en">
@include('template.header')
<main class="d-flex">
    @include('template.sidebar')
    @yield('content')
</main>
@include('template.footer')

</html>