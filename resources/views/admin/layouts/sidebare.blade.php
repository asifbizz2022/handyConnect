<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">
                    <div class="brand-logo"><img class="logo"
                            src="{{ asset('asset/admin/image/logo.png') }}" /></div>
                    <h2 class="brand-text mb-0">Handy Connect</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"
                        data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">
            <li class=" nav-item"><a href="{{ route('admin.dashboard.index') }}"><i
                        class="menu-livicon" data-icon="desktop"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2">2</span></a>
            </li>

            @can(['role.view', 'customer.view', 'employee.view'])
                <li class="nav-item"><a href="#"><i class="menu-livicon" data-icon="users"></i><span
                            class="menu-title" data-i18n="Users">@lang('role.users') @lang('role.management')</span></a>
                    <ul class="menu-content">
                        {{-- <li class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                            <a href="{{ URL::signedRoute('admin.users.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item" data-i18n="Invoice List">@lang('role.users')</span></a>
                        </li> --}}
                        @can('role.view')
                            <li
                                class="{{ request()->routeIs('admin.role.index') || request()->routeIs('admin.role.show') ? 'active' : '' }}">
                                <a href="{{ URL::signedRoute('admin.role.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice">@lang('role.roles')</span>
                                </a>
                            </li>
                        @endcan
                        @can('customer.view')
                            <li
                                class="{{ request()->routeIs('admin.customer.index') || request()->routeIs('admin.customer.create') ? 'active' : '' }}">
                                <a href="{{ URL::signedRoute('admin.customer.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice List">@lang('customer.customers')</span></a>
                            </li>
                        @endcan
                        <li
                            class="{{ request()->routeIs('admin.vendor.index') ||request()->routeIs('admin.vendor.create') ||request()->routeIs('admin.vendor.show')? 'active': '' }}">
                            <a href="{{ URL::signedRoute('admin.vendor.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item" data-i18n="Invoice List">@lang('vendor.vendor')</span></a>
                        </li>

                        @can('employee.view')
                            <li
                                class="{{ request()->routeIs('admin.employee.index') ||request()->routeIs('admin.employee.create') ||request()->routeIs('admin.employee.show')? 'active': '' }}">
                                <a href="{{ URL::signedRoute('admin.employee.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice List">@lang('employee.employee')</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('service.view')
                <li class="nav-item"><a href="#"><i class="menu-livicon" data-icon="notebook"></i><span
                            class="menu-title" data-i18n="Invoice">@lang('services.services')</span></a>
                    <ul class="menu-content">
                        @can('company.add')
                            <li class="{{ request()->routeIs('admin.company.index') ? 'active' : '' }}">
                                <a href="{{ URL::signedRoute('admin.company.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice List">
                                        @lang('services.company')
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('category.view')
                            <li class="{{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                                <a href="{{ URL::signedRoute('admin.category.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice">@lang('services.category')</span>
                                </a>
                            </li>
                        @endcan
                        @can('service.view')
                            <li
                                class="{{ request()->routeIs('admin.service.index') ||request()->routeIs('admin.service.create') ||request()->routeIs('admin.service.show')? 'active': '' }}">
                                <a href=" {{ URL::signedRoute('admin.service.index') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="menu-item" data-i18n="Invoice Edit">@lang('services.service')</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            <li class="nav-item"><a href="#"><i class="menu-livicon" data-icon="user"></i><span
                            class="menu-title" data-i18n="Invoice">@lang('Sub Contractor')</span></a>
                 <ul class="menu-content">
             @can('admin_crm.view')
               
            <li class="nav-item {{ request()->routeIs('subcontractor') ? 'active': '' }}">
                    <a href="{{ route('subcontractor') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('SubContractor')</span>
                    </a>
            </li>

              <li class="nav-item {{ request()->routeIs('subcontractor.assign_job') ? 'active': '' }}">
                    <a href="{{ route('subcontractor.assign_job') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Assign Job')</span>
                    </a>
            </li>
           
           <!--  <li class="nav-item { request()->routeIs('admin.vendor_crm.index') ? 'active': '' }}">
                    <a href="{{ URL::signedRoute('admin.vendor_crm.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Vendor Crm')</span>
                    </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('admin.sales_person.index') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.sales_person.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Sales Person')</span>
                    </a>
            </li> -->
            @endcan
            </ul>
            @endcan

            <li class=" navigation-header"><span>@lang('crm.crm')</span>
            </li>
            @can('admin_crm.view')
                <li
                    class="nav-item {{ request()->routeIs('admin.crm.index') ||request()->routeIs('admin.crm.show_crm') ||request()->routeIs('admin.crm.store') ||request()->routeIs('admin.crm.edit')? 'active': '' }}">
                    <a href="{{ URL::signedRoute('admin.crm.index') }}">
                        <i class="menu-livicon" data-icon="briefcase"></i>
                        <span class="menu-title" data-i18n="Email">@lang('crm.crm')</span>
                    </a>
                </li>
            @endcan
            @can('vendor_crm.view')
                <li class="nav-item {{ request()->routeIs('admin.vendor_crm.index') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.vendor_crm.index') }}">
                        <i class="menu-livicon" data-icon="envelope-pull"></i>
                        <span class="menu-title" data-i18n="Email">@lang('crm.crm')</span>
                    </a>
                </li>
            @endcan
            @can('sales_person_crm.view')
                <li class="nav-item {{ request()->routeIs('admin.sales_person.index') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.sales_person.index') }}">
                        <i class="menu-livicon" data-icon="envelope-pull"></i>
                        <span class="menu-title" data-i18n="Email">@lang('crm.crm')</span>
                    </a>
                </li>
            @endcan

              

           <!--  <li class="nav-item"><a href="#"><i class="menu-livicon" data-icon="morph-stack"></i><span
                            class="menu-title" data-i18n="Invoice">@lang('Leads Management')</span></a>
                 <ul class="menu-content">
             @can('admin_crm.view')
               
            <li class="nav-item {{ request()->routeIs('admin.crm.create') ? 'active': '' }}">
                    <a href="{{ URL::signedRoute('admin.crm.create') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Create Leads')</span>
                    </a>
            </li>
           
            <li class="nav-item { request()->routeIs('admin.vendor_crm.index') ? 'active': '' }}">
                    <a href="{{ URL::signedRoute('admin.vendor_crm.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Vendor Crm')</span>
                    </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('admin.sales_person.index') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.sales_person.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Sales Person')</span>
                    </a>
            </li>
            @endcan
            </ul> -->

             @can('admin_crm.view')
                <li
                    class="nav-item {{ request()->routeIs('enquiry.list') || request()->routeIs('enquiry.list')? 'active': '' }}">
                    <a href="{{ route('enquiry.list') }}">
                        <i class="menu-livicon" data-icon="envelope-put"></i>
                        <span class="menu-title" data-i18n="Email">@lang('Enquiry Management')</span>
                    </a>
                </li>
            @endcan
            @can('admin_crm.view')
                <li class="nav-item {{ request()->routeIs('admin.show_lead') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.show_lead') }}">
                        <i class="menu-livicon" data-icon="print-doc"></i>
                        <span class="menu-title" data-i18n="Email">Quotation (HC)</span>
                    </a>
                </li>
            @endcan
             @can('admin_crm.view')
                <li class="nav-item {{ request()->routeIs('admin.works-list') ? 'active' : '' }}">
                    <a href="{{ route('works-list') }}">
                        <i class="menu-livicon" data-icon="print-image"></i>
                        <span class="menu-title" data-i18n="Email">Quotation (GI)</span>
                    </a>
                </li>
            @endcan
             @can('admin_crm.view')
                <li class="nav-item  {{ request()->routeIs('listofwork') ? 'active' : '' }}">
                    <a href="{{ route('listofwork')}}">
                        <i class="menu-livicon" data-icon="list"></i>
                        <span class="menu-title" data-i18n="Email">List Of Work</span>
                    </a>
                </li>
            @endcan
            @can('admin_crm.view')
            <li class="nav-item  {{ request()->routeIs('scopeofwork') ? 'active' : '' }}">
                    <a href="{{ route('scopeofwork')}}">
                        <i class="menu-livicon" data-icon="grid"></i>
                        <span class="menu-title" data-i18n="Email">Scope Of Work</span>
                    </a>
                </li>
             @endcan
             
            <li class="nav-item  {{ request()->routeIs('news') ? 'active' : '' }}">
                    <a href="{{ route('news')}}">
                        <i class="menu-livicon" data-icon="comment"></i>
                        <span class="menu-title" data-i18n="Email">News Feed</span>
                    </a>
                </li>
            <li class="nav-item  {{ request()->routeIs('order-index') ? 'active' : '' }}">
                <a href="{{ route('order-index')}}">
                    <i class="menu-livicon" data-icon="shoppingcart-in"></i>
                    <span class="menu-title" data-i18n="Email">Order management</span>
                </a>
            </li>


            </li> <li class="nav-item"><a href="#"><i class="menu-livicon" data-icon="user"></i><span
                            class="menu-title" data-i18n="Invoice">@lang('Reporting')</span></a>
                 <ul class="menu-content">
             @can('admin_crm.view')
               
            <li class="nav-item {{ request()->routeIs('admin.sales_report_show') ? 'active': '' }}">
                    <a href="{{ route('admin.sales_report_show') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Sales Reporting')</span>
                    </a>
            </li>

              <li class="nav-item {{ request()->routeIs('admin.order_report_show') ? 'active': '' }}">
                    <a href="{{ route('admin.order_report_show') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Order Reporting')</span>
                    </a>
            </li>
           
           <!--  <li class="nav-item { request()->routeIs('admin.vendor_crm.index') ? 'active': '' }}">
                    <a href="{{ URL::signedRoute('admin.vendor_crm.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Vendor Crm')</span>
                    </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('admin.sales_person.index') ? 'active' : '' }}">
                    <a href="{{ URL::signedRoute('admin.sales_person.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="menu-item" data-i18n="Email">@lang('Sales Person')</span>
                    </a>
            </li> -->
            @endcan
            </ul>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
