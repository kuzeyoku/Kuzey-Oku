@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content settings-content">
        <div class="page-header settings-pg-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Settings</h4>
                    <h6>Manage your settings on portal</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="settings-wrapper d-flex">
                    <div class="sidebars settings-sidebar">
                        <div class="sidebar-inner slimscroll">
                            <div id="sidebar-menu5" class="sidebar-menu">
                                <ul>
                                    @foreach (App\Enums\SettingCategoryEnum::cases() as $setting)
                                        <li class="submenu-open mb-0">
                                            <ul>
                                                <li class="submenu">
                                                    <a href="javascript:void(0);"
                                                        class="active subdrop">@svg($setting->icon())<span>{{ $setting->title() }}</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="settings-page-wrap">
                        @yield('setting_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
