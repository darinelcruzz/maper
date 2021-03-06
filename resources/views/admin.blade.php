<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Intranet'])
@show

<body class="skin-red sidebar-mini {{ Auth::user()->level == 3 ? 'sidebar-collapse': '' }}">
    <div id="app" v-cloak>
        <div class="wrapper">

        @include('adminlte::layouts.partials.mainheader')

        @include('adminlte::layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('main-content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @include('adminlte::layouts.partials.footer')

        </div><!-- ./wrapper -->
    </div>

    @section('scripts')
        @include('adminlte::layouts.partials.scripts')
    @show

</body>
</html>
