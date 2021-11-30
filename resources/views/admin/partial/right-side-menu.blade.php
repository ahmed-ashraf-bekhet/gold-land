<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('departments.index') }}">
                    <i class="fa fa-building"></i> <span>{{ __($langFile.'Departments') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-bookmark"></i> <span>{{ __($langFile.'Categories') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('karats.index') }}">
                    <i class="fa fa-balance-scale"></i> <span>{{ __($langFile.'Karats') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-diamond"></i> <span>{{ __($langFile.'Products') }}</span>
                    {{-- fa-line-chart --}}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>{{ __($langFile.'Orders') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('advertsments.index') }}">
                    <i class="fa fa-ad"></i> <span>{{ __($langFile.'Advertsments') }}</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

{{-- $dates = DatePrice::where('tour_id','=',$request->product_id)
    ->whereBetween('start', array('2017-06-20', '2017-07-11'))
    ->whereBetween('end', array('2017-06-20', '2017-07-11'))
    ->get(); --}}
