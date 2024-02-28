<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos Admin Template</title>
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/' . config('template.admin.asset') . '/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/' . config('template.admin.asset') . '/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/' . config('template.admin.asset') . '/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/' . config('template.admin.asset') . '/css/animate.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/' . config('template.admin.asset') . '/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/' . config('template.admin.asset') . '/plugins/fontawesome/css/fontawesome.min.css') }}">
    @stack('style')
    <link rel="stylesheet"
        href="{{ asset('assets/' . config('template.admin.asset') . '/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/' . config('template.admin.asset') . '/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        @includeTheme("admin","layout.header")
        @includeTheme("admin","layout.sidebar")


        <div class="sidebar collapsed-sidebar" id="collapsed-sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu-2" class="sidebar-menu sidebar-menu-three">
                    <aside id="aside" class="ui-aside">
                        <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link active" href="#home" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/menu-icon.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#messages" id="messages-tab" data-bs-toggle="tab"
                                    data-bs-target="#product" role="tab" aria-selected="false">
                                    <img src="assets/img/icons/product.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#profile" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#sales" role="tab" aria-selected="false">
                                    <img src="assets/img/icons/sales1.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#report" id="report-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/purchase1.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set" id="set-tab" data-bs-toggle="tab"
                                    data-bs-target="#user" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/users1.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set2" id="set-tab2" data-bs-toggle="tab"
                                    data-bs-target="#employee" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/calendars.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set3" id="set-tab3" data-bs-toggle="tab"
                                    data-bs-target="#report" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/printer.svg" alt="">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set4" id="set-tab4" data-bs-toggle="tab"
                                    data-bs-target="#document" role="tab" aria-selected="true">
                                    <i data-feather="file-minus"></i>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set5" id="set-tab6" data-bs-toggle="tab"
                                    data-bs-target="#permission" role="tab" aria-selected="true">
                                    <i data-feather="user"></i>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set6" id="set-tab5" data-bs-toggle="tab"
                                    data-bs-target="#settings" role="tab" aria-selected="true">
                                    <i data-feather="settings"></i>
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <div class="tab-content tab-content-four pt-2">
                        <ul class="tab-pane active" id="home" aria-labelledby="home-tab">
                            <li class="submenu">
                                <a href="javascript:void(0);" class="active"><span>Dashboard</span> <span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="index.html.htm" class="active">Admin Dashboard</a></li>
                                    <li><a href="sales-dashboard.html.htm">Sales Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Application</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chat.html.htm">Chat</a></li>
                                    <li class="submenu submenu-two"><a
                                            href="javascript:void(0);"><span>Call</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="video-call.html.htm">Video Call</a></li>
                                            <li><a href="audio-call.html.htm">Audio Call</a></li>
                                            <li><a href="call-history.html.htm">Call History</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="calendar.html.htm">Calendar</a></li>
                                    <li><a href="email.html.htm">Email</a></li>
                                    <li><a href="todo.html.htm">To Do</a></li>
                                    <li><a href="notes.html.htm">Notes</a></li>
                                    <li><a href="file-manager.html.htm">File Manager</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="product" aria-labelledby="messages-tab">
                            <li><a href="product-list.html.htm"><span>Products</span></a></li>
                            <li><a href="add-product.html.htm"><span>Create Product</span></a></li>
                            <li><a href="expired-products.html.htm"><span>Expired Products</span></a></li>
                            <li><a href="low-stocks.html.htm"><span>Low Stocks</span></a></li>
                            <li><a href="category-list.html.htm"><span>Category</span></a></li>
                            <li><a href="sub-categories.html.htm"><span>Sub Category</span></a></li>
                            <li><a href="brand-list.html.htm"><span>Brands</span></a></li>
                            <li><a href="units.html.htm"><span>Units</span></a></li>
                            <li><a href="varriant-attributes.html.htm"><span>Variant Attributes</span></a></li>
                            <li><a href="warranty.html.htm"><span>Warranties</span></a></li>
                            <li><a href="barcode.html.htm"><span>Print Barcode</span></a></li>
                            <li><a href="qrcode.html.htm"><span>Print QR Code</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="sales" aria-labelledby="profile-tab">
                            <li><a href="sales-list.html.htm"><span>Sales</span></a></li>
                            <li><a href="invoice-report.html.htm"><span>Invoices</span></a></li>
                            <li><a href="sales-returns.html.htm"><span>Sales Return</span></a></li>
                            <li><a href="quotation-list.html.htm"><span>Quotation</span></a></li>
                            <li><a href="pos.html.htm"><span>POS</span></a></li>
                            <li><a href="coupons.html.htm"><span>Coupons</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="purchase" aria-labelledby="report-tab">
                            <li><a href="purchase-list.html.htm"><span>Purchases</span></a></li>
                            <li><a href="purchase-order-report.html.htm"><span>Purchase Order</span></a></li>
                            <li><a href="purchase-returns.html.htm"><span>Purchase Return</span></a></li>
                            <li><a href="manage-stocks.html.htm"><span>Manage Stock</span></a></li>
                            <li><a href="stock-adjustment.html.htm"><span>Stock Adjustment</span></a></li>
                            <li><a href="stock-transfer.html.htm"><span>Stock Transfer</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Expenses</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="expense-list.html.htm">Expenses</a></li>
                                    <li><a href="expense-category.html.htm">Expense Category</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="user" aria-labelledby="set-tab">
                            <li><a href="customers.html.htm"><span>Customers</span></a></li>
                            <li><a href="suppliers.html.htm"><span>Suppliers</span></a></li>
                            <li><a href="store-list.html.htm"><span>Stores</span></a></li>
                            <li><a href="warehouse.html.htm"><span>Warehouses</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="employee" aria-labelledby="set-tab2">
                            <li><a href="employees-grid.html.htm"><span>Employees</span></a></li>
                            <li><a href="department-grid.html.htm"><span>Departments</span></a></li>
                            <li><a href="designation.html.htm"><span>Designation</span></a></li>
                            <li><a href="shift.html.htm"><span>Shifts</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Attendence</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="attendance-employee.html.htm">Employee Attendence</a></li>
                                    <li><a href="attendance-admin.html.htm">Admin Attendence</a></li>
                                </ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Leaves</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="leaves-admin.html.htm">Admin Leaves</a></li>
                                    <li><a href="leaves-employee.html.htm">Employee Leaves</a></li>
                                    <li><a href="leave-types.html.htm">Leave Types</a></li>
                                </ul>
                            </li>
                            <li><a href="holidays.html.htm"><span>Holidays</span></a></li>
                            <li class="submenu">
                                <a href="payroll-list.html.htm"><span>Payroll</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payroll-list.html.htm">Employee Salary</a></li>
                                    <li><a href="payslip.html.htm">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="report" aria-labelledby="set-tab3">
                            <li><a href="sales-report.html.htm"><span>Sales Report</span></a></li>
                            <li><a href="purchase-report.html.htm"><span>Purchase report</span></a></li>
                            <li><a href="inventory-report.html.htm"><span>Inventory Report</span></a></li>
                            <li><a href="invoice-report.html.htm"><span>Invoice Report</span></a></li>
                            <li><a href="supplier-report.html.htm"><span>Supplier Report</span></a></li>
                            <li><a href="customer-report.html.htm"><span>Customer Report</span></a></li>
                            <li><a href="expense-report.html.htm"><span>Expense Report</span></a></li>
                            <li><a href="income-report.html.htm"><span>Income Report</span></a></li>
                            <li><a href="tax-reports.html.htm"><span>Tax Report</span></a></li>
                            <li><a href="profit-and-loss.html.htm"><span>Profit & Loss</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="permission" aria-labelledby="set-tab4">
                            <li><a href="users.html.htm"><span>Users</span></a></li>
                            <li><a href="roles-permissions.html.htm"><span>Roles & Permissions</span></a></li>
                            <li><a href="delete-account.html.htm"><span>Delete Account Request</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Base UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="ui-alerts.html.htm">Alerts</a></li>
                                    <li><a href="ui-accordion.html.htm">Accordion</a></li>
                                    <li><a href="ui-avatar.html.htm">Avatar</a></li>
                                    <li><a href="ui-badges.html.htm">Badges</a></li>
                                    <li><a href="ui-borders.html.htm">Border</a></li>
                                    <li><a href="ui-buttons.html.htm">Buttons</a></li>
                                    <li><a href="ui-buttons-group.html.htm">Button Group</a></li>
                                    <li><a href="ui-breadcrumb.html.htm">Breadcrumb</a></li>
                                    <li><a href="ui-cards.html.htm">Card</a></li>
                                    <li><a href="ui-carousel.html.htm">Carousel</a></li>
                                    <li><a href="ui-colors.html.htm">Colors</a></li>
                                    <li><a href="ui-dropdowns.html.htm">Dropdowns</a></li>
                                    <li><a href="ui-grid.html.htm">Grid</a></li>
                                    <li><a href="ui-images.html.htm">Images</a></li>
                                    <li><a href="ui-lightbox.html.htm">Lightbox</a></li>
                                    <li><a href="ui-media.html.htm">Media</a></li>
                                    <li><a href="ui-modals.html.htm">Modals</a></li>
                                    <li><a href="ui-offcanvas.html.htm">Offcanvas</a></li>
                                    <li><a href="ui-pagination.html.htm">Pagination</a></li>
                                    <li><a href="ui-popovers.html.htm">Popovers</a></li>
                                    <li><a href="ui-progress.html.htm">Progress</a></li>
                                    <li><a href="ui-placeholders.html.htm">Placeholders</a></li>
                                    <li><a href="ui-rangeslider.html.htm">Range Slider</a></li>
                                    <li><a href="ui-spinner.html.htm">Spinner</a></li>
                                    <li><a href="ui-sweetalerts.html.htm">Sweet Alerts</a></li>
                                    <li><a href="ui-nav-tabs.html.htm">Tabs</a></li>
                                    <li><a href="ui-toasts.html.htm">Toasts</a></li>
                                    <li><a href="ui-tooltips.html.htm">Tooltips</a></li>
                                    <li><a href="ui-typography.html.htm">Typography</a></li>
                                    <li><a href="ui-video.html.htm">Video</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Advanced UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="ui-ribbon.html.htm">Ribbon</a></li>
                                    <li><a href="ui-clipboard.html.htm">Clipboard</a></li>
                                    <li><a href="ui-drag-drop.html.htm">Drag & Drop</a></li>
                                    <li><a href="ui-rangeslider.html.htm">Range Slider</a></li>
                                    <li><a href="ui-rating.html.htm">Rating</a></li>
                                    <li><a href="ui-text-editor.html.htm">Text Editor</a></li>
                                    <li><a href="ui-counter.html.htm">Counter</a></li>
                                    <li><a href="ui-scrollbar.html.htm">Scrollbar</a></li>
                                    <li><a href="ui-stickynote.html.htm">Sticky Note</a></li>
                                    <li><a href="ui-timeline.html.htm">Timeline</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Charts</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chart-apex.html.htm">Apex Charts</a></li>
                                    <li><a href="chart-c3.html.htm">Chart C3</a></li>
                                    <li><a href="chart-js.html.htm">Chart Js</a></li>
                                    <li><a href="chart-morris.html.htm">Morris Charts</a></li>
                                    <li><a href="chart-flot.html.htm">Flot Charts</a></li>
                                    <li><a href="chart-peity.html.htm">Peity Charts</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Icons</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-fontawesome.html.htm">Fontawesome Icons</a></li>
                                    <li><a href="icon-feather.html.htm">Feather Icons</a></li>
                                    <li><a href="icon-ionic.html.htm">Ionic Icons</a></li>
                                    <li><a href="icon-material.html.htm">Material Icons</a></li>
                                    <li><a href="icon-pe7.html.htm">Pe7 Icons</a></li>
                                    <li><a href="icon-simpleline.html.htm">Simpleline Icons</a></li>
                                    <li><a href="icon-themify.html.htm">Themify Icons</a></li>
                                    <li><a href="icon-weather.html.htm">Weather Icons</a></li>
                                    <li><a href="icon-typicon.html.htm">Typicon Icons</a></li>
                                    <li><a href="icon-flag.html.htm">Flag Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Forms</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Form Elements<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-basic-inputs.html.htm">Basic Inputs</a></li>
                                            <li><a href="form-checkbox-radios.html.htm">Checkbox & Radios</a></li>
                                            <li><a href="form-input-groups.html.htm">Input Groups</a></li>
                                            <li><a href="form-grid-gutters.html.htm">Grid & Gutters</a></li>
                                            <li><a href="form-select.html.htm">Form Select</a></li>
                                            <li><a href="form-mask.html.htm">Input Masks</a></li>
                                            <li><a href="form-fileupload.html.htm">File Uploads</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Layouts<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-horizontal.html.htm">Horizontal Form</a></li>
                                            <li><a href="form-vertical.html.htm">Vertical Form</a></li>
                                            <li><a href="form-floating-labels.html.htm">Floating Labels</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="form-validation.html.htm">Form Validation</a></li>
                                    <li><a href="form-select2.html.htm">Select2</a></li>
                                    <li><a href="form-wizard.html.htm">Form Wizard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="tables-basic.html.htm">Basic Tables </a></li>
                                    <li><a href="data-tables.html.htm">Data Table </a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="document" aria-labelledby="set-tab5">
                            <li><a href="profile.html.htm"><span>Profile</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Authentication</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="signin.html.htm">Cover</a></li>
                                            <li><a href="signin-2.html.htm">Illustration</a></li>
                                            <li><a href="signin-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="register.html.htm">Cover</a></li>
                                            <li><a href="register-2.html.htm">Illustration</a></li>
                                            <li><a href="register-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="forgot-password.html.htm">Cover</a></li>
                                            <li><a href="forgot-password-2.html.htm">Illustration</a></li>
                                            <li><a href="forgot-password-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="reset-password.html.htm">Cover</a></li>
                                            <li><a href="reset-password-2.html.htm">Illustration</a></li>
                                            <li><a href="reset-password-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="email-verification.html.htm">Cover</a></li>
                                            <li><a href="email-verification-2.html.htm">Illustration</a></li>
                                            <li><a href="email-verification-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="two-step-verification.html.htm">Cover</a></li>
                                            <li><a href="two-step-verification-2.html.htm">Illustration</a></li>
                                            <li><a href="two-step-verification-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="lock-screen.html.htm">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Error Pages</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="error-404.html.htm">404 Error </a></li>
                                    <li><a href="error-500.html.htm">500 Error </a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Places</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="countries.html.htm">Countries</a></li>
                                    <li><a href="states.html.htm">States</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blank-page.html.htm"><span>Blank Page</span> </a>
                            </li>
                            <li>
                                <a href="coming-soon.html.htm"><span>Coming Soon</span> </a>
                            </li>
                            <li>
                                <a href="under-maintenance.html.htm"><span>Under Maintenance</span> </a>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="settings" aria-labelledby="set-tab6">
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>General Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="general-settings.html.htm">Profile</a></li>
                                    <li><a href="security-settings.html.htm">Security</a></li>
                                    <li><a href="notification.html.htm">Notifications</a></li>
                                    <li><a href="connected-apps.html.htm">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Website Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="system-settings.html.htm">System Settings</a></li>
                                    <li><a href="company-settings.html.htm">Company Settings </a></li>
                                    <li><a href="localization-settings.html.htm">Localization</a></li>
                                    <li><a href="prefixes.html.htm">Prefixes</a></li>
                                    <li><a href="preference.html.htm">Preference</a></li>
                                    <li><a href="appearance.html.htm">Appearance</a></li>
                                    <li><a href="social-authentication.html.htm">Social Authentication</a></li>
                                    <li><a href="language-settings.html.htm">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>App Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="invoice-settings.html.htm">Invoice</a></li>
                                    <li><a href="printer-settings.html.htm">Printer</a></li>
                                    <li><a href="pos-settings.html.htm">POS</a></li>
                                    <li><a href="custom-fields.html.htm">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>System Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="email-settings.html.htm">Email</a></li>
                                    <li><a href="sms-gateway.html.htm">SMS Gateways</a></li>
                                    <li><a href="otp-settings.html.htm">OTP</a></li>
                                    <li><a href="gdpr-settings.html.htm">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Financial Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payment-gateway-settings.html.htm">Payment Gateway</a></li>
                                    <li><a href="bank-settings-grid.html.htm">Bank Accounts</a></li>
                                    <li><a href="tax-rates.html.htm">Tax Rates</a></li>
                                    <li><a href="currency-settings.html.htm">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Other Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="storage-settings.html.htm">Storage</a></li>
                                    <li><a href="ban-ip-address.html.htm">Ban IP Address</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                            <li><a href="javascript:void(0);"><span>Changelog v2.0.3</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Multi Level</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Level 1.1</a></li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 2.1</a></li>
                                            <li class="submenu submenu-two submenu-three"><a
                                                    href="javascript:void(0);">Level 2.2<span
                                                        class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                <ul>
                                                    <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                    <li><a href="javascript:void(0);">Level 3.2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="sidebar horizontal-sidebar">
            <div id="sidebar-menu-3" class="sidebar-menu">
                <ul class="nav">
                    <li class="submenu">
                        <a href="index.html.htm" class="active subdrop"><i data-feather="grid"></i><span> Main
                                Menu</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="active subdrop"><span>Dashboard</span> <span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="index.html.htm" class="active">Admin Dashboard</a></li>
                                    <li><a href="sales-dashboard.html.htm">Sales Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Application</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chat.html.htm">Chat</a></li>
                                    <li class="submenu submenu-two"><a
                                            href="javascript:void(0);"><span>Call</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="video-call.html.htm">Video Call</a></li>
                                            <li><a href="audio-call.html.htm">Audio Call</a></li>
                                            <li><a href="call-history.html.htm">Call History</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="calendar.html.htm">Calendar</a></li>
                                    <li><a href="email.html.htm">Email</a></li>
                                    <li><a href="todo.html.htm">To Do</a></li>
                                    <li><a href="notes.html.htm">Notes</a></li>
                                    <li><a href="file-manager.html.htm">File Manager</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                Inventory
                            </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="product-list.html.htm"><span>Products</span></a></li>
                            <li><a href="add-product.html.htm"><span>Create Product</span></a></li>
                            <li><a href="expired-products.html.htm"><span>Expired Products</span></a></li>
                            <li><a href="low-stocks.html.htm"><span>Low Stocks</span></a></li>
                            <li><a href="category-list.html.htm"><span>Category</span></a></li>
                            <li><a href="sub-categories.html.htm"><span>Sub Category</span></a></li>
                            <li><a href="brand-list.html.htm"><span>Brands</span></a></li>
                            <li><a href="units.html.htm"><span>Units</span></a></li>
                            <li><a href="varriant-attributes.html.htm"><span>Variant Attributes</span></a></li>
                            <li><a href="warranty.html.htm"><span>Warranties</span></a></li>
                            <li><a href="barcode.html.htm"><span>Print Barcode</span></a></li>
                            <li><a href="qrcode.html.htm"><span>Print QR Code</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg"
                                alt="img"><span>Sales &amp; Purchase</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="sales-list.html.htm"><span>Sales</span></a></li>
                                    <li><a href="invoice-report.html.htm"><span>Invoices</span></a></li>
                                    <li><a href="sales-returns.html.htm"><span>Sales Return</span></a></li>
                                    <li><a href="quotation-list.html.htm"><span>Quotation</span></a></li>
                                    <li><a href="pos.html.htm"><span>POS</span></a></li>
                                    <li><a href="coupons.html.htm"><span>Coupons</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Purchase</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="purchase-list.html.htm"><span>Purchases</span></a></li>
                                    <li><a href="purchase-order-report.html.htm"><span>Purchase Order</span></a></li>
                                    <li><a href="purchase-returns.html.htm"><span>Purchase Return</span></a></li>
                                    <li><a href="manage-stocks.html.htm"><span>Manage Stock</span></a></li>
                                    <li><a href="stock-adjustment.html.htm"><span>Stock Adjustment</span></a></li>
                                    <li><a href="stock-transfer.html.htm"><span>Stock Transfer</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Expenses</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="expense-list.html.htm">Expenses</a></li>
                                    <li><a href="expense-category.html.htm">Expense Category</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg"
                                alt="img"><span>User Management</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>People</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="customers.html.htm"><span>Customers</span></a></li>
                                    <li><a href="suppliers.html.htm"><span>Suppliers</span></a></li>
                                    <li><a href="store-list.html.htm"><span>Stores</span></a></li>
                                    <li><a href="warehouse.html.htm"><span>Warehouses</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Roles &amp; Permissions</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="roles-permissions.html.htm"><span>Roles & Permissions</span></a></li>
                                    <li><a href="delete-account.html.htm"><span>Delete Account Request</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Base UI</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="ui-alerts.html.htm">Alerts</a></li>
                                    <li><a href="ui-accordion.html.htm">Accordion</a></li>
                                    <li><a href="ui-avatar.html.htm">Avatar</a></li>
                                    <li><a href="ui-badges.html.htm">Badges</a></li>
                                    <li><a href="ui-borders.html.htm">Border</a></li>
                                    <li><a href="ui-buttons.html.htm">Buttons</a></li>
                                    <li><a href="ui-buttons-group.html.htm">Button Group</a></li>
                                    <li><a href="ui-breadcrumb.html.htm">Breadcrumb</a></li>
                                    <li><a href="ui-cards.html.htm">Card</a></li>
                                    <li><a href="ui-carousel.html.htm">Carousel</a></li>
                                    <li><a href="ui-colors.html.htm">Colors</a></li>
                                    <li><a href="ui-dropdowns.html.htm">Dropdowns</a></li>
                                    <li><a href="ui-grid.html.htm">Grid</a></li>
                                    <li><a href="ui-images.html.htm">Images</a></li>
                                    <li><a href="ui-lightbox.html.htm">Lightbox</a></li>
                                    <li><a href="ui-media.html.htm">Media</a></li>
                                    <li><a href="ui-modals.html.htm">Modals</a></li>
                                    <li><a href="ui-offcanvas.html.htm">Offcanvas</a></li>
                                    <li><a href="ui-pagination.html.htm">Pagination</a></li>
                                    <li><a href="ui-popovers.html.htm">Popovers</a></li>
                                    <li><a href="ui-progress.html.htm">Progress</a></li>
                                    <li><a href="ui-placeholders.html.htm">Placeholders</a></li>
                                    <li><a href="ui-rangeslider.html.htm">Range Slider</a></li>
                                    <li><a href="ui-spinner.html.htm">Spinner</a></li>
                                    <li><a href="ui-sweetalerts.html.htm">Sweet Alerts</a></li>
                                    <li><a href="ui-nav-tabs.html.htm">Tabs</a></li>
                                    <li><a href="ui-toasts.html.htm">Toasts</a></li>
                                    <li><a href="ui-tooltips.html.htm">Tooltips</a></li>
                                    <li><a href="ui-typography.html.htm">Typography</a></li>
                                    <li><a href="ui-video.html.htm">Video</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Advanced UI</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="ui-ribbon.html.htm">Ribbon</a></li>
                                    <li><a href="ui-clipboard.html.htm">Clipboard</a></li>
                                    <li><a href="ui-drag-drop.html.htm">Drag & Drop</a></li>
                                    <li><a href="ui-rangeslider.html.htm">Range Slider</a></li>
                                    <li><a href="ui-rating.html.htm">Rating</a></li>
                                    <li><a href="ui-text-editor.html.htm">Text Editor</a></li>
                                    <li><a href="ui-counter.html.htm">Counter</a></li>
                                    <li><a href="ui-scrollbar.html.htm">Scrollbar</a></li>
                                    <li><a href="ui-stickynote.html.htm">Sticky Note</a></li>
                                    <li><a href="ui-timeline.html.htm">Timeline</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Charts</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chart-apex.html.htm">Apex Charts</a></li>
                                    <li><a href="chart-c3.html.htm">Chart C3</a></li>
                                    <li><a href="chart-js.html.htm">Chart Js</a></li>
                                    <li><a href="chart-morris.html.htm">Morris Charts</a></li>
                                    <li><a href="chart-flot.html.htm">Flot Charts</a></li>
                                    <li><a href="chart-peity.html.htm">Peity Charts</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Primary Icons</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-fontawesome.html.htm">Fontawesome Icons</a></li>
                                    <li><a href="icon-feather.html.htm">Feather Icons</a></li>
                                    <li><a href="icon-ionic.html.htm">Ionic Icons</a></li>
                                    <li><a href="icon-material.html.htm">Material Icons</a></li>
                                    <li><a href="icon-pe7.html.htm">Pe7 Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Secondary Icons</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-simpleline.html.htm">Simpleline Icons</a></li>
                                    <li><a href="icon-themify.html.htm">Themify Icons</a></li>
                                    <li><a href="icon-weather.html.htm">Weather Icons</a></li>
                                    <li><a href="icon-typicon.html.htm">Typicon Icons</a></li>
                                    <li><a href="icon-flag.html.htm">Flag Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span> Forms</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);"><span>Form Elements</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-basic-inputs.html.htm">Basic Inputs</a></li>
                                            <li><a href="form-checkbox-radios.html.htm">Checkbox & Radios</a></li>
                                            <li><a href="form-input-groups.html.htm">Input Groups</a></li>
                                            <li><a href="form-grid-gutters.html.htm">Grid & Gutters</a></li>
                                            <li><a href="form-select.html.htm">Form Select</a></li>
                                            <li><a href="form-mask.html.htm">Input Masks</a></li>
                                            <li><a href="form-fileupload.html.htm">File Uploads</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);"><span> Layouts</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-horizontal.html.htm">Horizontal Form</a></li>
                                            <li><a href="form-vertical.html.htm">Vertical Form</a></li>
                                            <li><a href="form-floating-labels.html.htm">Floating Labels</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="form-validation.html.htm">Form Validation</a></li>
                                    <li><a href="form-select2.html.htm">Select2</a></li>
                                    <li><a href="form-wizard.html.htm">Form Wizard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="tables-basic.html.htm">Basic Tables </a></li>
                                    <li><a href="data-tables.html.htm">Data Table </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><i data-feather="user"></i><span>Profile</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="profile.html.htm"><span>Profile</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Authentication</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="signin.html.htm">Cover</a></li>
                                            <li><a href="signin-2.html.htm">Illustration</a></li>
                                            <li><a href="signin-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="register.html.htm">Cover</a></li>
                                            <li><a href="register-2.html.htm">Illustration</a></li>
                                            <li><a href="register-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="forgot-password.html.htm">Cover</a></li>
                                            <li><a href="forgot-password-2.html.htm">Illustration</a></li>
                                            <li><a href="forgot-password-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="reset-password.html.htm">Cover</a></li>
                                            <li><a href="reset-password-2.html.htm">Illustration</a></li>
                                            <li><a href="reset-password-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="email-verification.html.htm">Cover</a></li>
                                            <li><a href="email-verification-2.html.htm">Illustration</a></li>
                                            <li><a href="email-verification-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="two-step-verification.html.htm">Cover</a></li>
                                            <li><a href="two-step-verification-2.html.htm">Illustration</a></li>
                                            <li><a href="two-step-verification-3.html.htm">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="lock-screen.html.htm">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="error-404.html.htm">404 Error </a></li>
                                    <li><a href="error-500.html.htm">500 Error </a></li>
                                    <li><a href="blank-page.html.htm"><span>Blank Page</span> </a></li>
                                    <li><a href="coming-soon.html.htm"><span>Coming Soon</span> </a></li>
                                    <li><a href="under-maintenance.html.htm"><span>Under Maintenance</span> </a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Places</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="countries.html.htm">Countries</a></li>
                                    <li><a href="states.html.htm">States</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Employees</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="employees-grid.html.htm"><span>Employees</span></a></li>
                                    <li><a href="department-grid.html.htm"><span>Departments</span></a></li>
                                    <li><a href="designation.html.htm"><span>Designation</span></a></li>
                                    <li><a href="shift.html.htm"><span>Shifts</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Attendence</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="attendance-employee.html.htm">Employee Attendence</a></li>
                                    <li><a href="attendance-admin.html.htm">Admin Attendence</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Leaves &amp; Holidays</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="leaves-admin.html.htm">Admin Leaves</a></li>
                                    <li><a href="leaves-employee.html.htm">Employee Leaves</a></li>
                                    <li><a href="leave-types.html.htm">Leave Types</a></li>
                                    <li><a href="holidays.html.htm"><span>Holidays</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="payroll-list.html.htm"><span>Payroll</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payroll-list.html.htm">Employee Salary</a></li>
                                    <li><a href="payslip.html.htm">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/printer.svg"
                                alt="img"><span>Reports</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="sales-report.html.htm"><span>Sales Report</span></a></li>
                            <li><a href="purchase-report.html.htm"><span>Purchase report</span></a></li>
                            <li><a href="inventory-report.html.htm"><span>Inventory Report</span></a></li>
                            <li><a href="invoice-report.html.htm"><span>Invoice Report</span></a></li>
                            <li><a href="supplier-report.html.htm"><span>Supplier Report</span></a></li>
                            <li><a href="customer-report.html.htm"><span>Customer Report</span></a></li>
                            <li><a href="expense-report.html.htm"><span>Expense Report</span></a></li>
                            <li><a href="income-report.html.htm"><span>Income Report</span></a></li>
                            <li><a href="tax-reports.html.htm"><span>Tax Report</span></a></li>
                            <li><a href="profit-and-loss.html.htm"><span>Profit & Loss</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg"
                                alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>General Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="general-settings.html.htm">Profile</a></li>
                                    <li><a href="security-settings.html.htm">Security</a></li>
                                    <li><a href="notification.html.htm">Notifications</a></li>
                                    <li><a href="connected-apps.html.htm">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Website Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="system-settings.html.htm">System Settings</a></li>
                                    <li><a href="company-settings.html.htm">Company Settings </a></li>
                                    <li><a href="localization-settings.html.htm">Localization</a></li>
                                    <li><a href="prefixes.html.htm">Prefixes</a></li>
                                    <li><a href="preference.html.htm">Preference</a></li>
                                    <li><a href="appearance.html.htm">Appearance</a></li>
                                    <li><a href="social-authentication.html.htm">Social Authentication</a></li>
                                    <li><a href="language-settings.html.htm">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>App Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="invoice-settings.html.htm">Invoice</a></li>
                                    <li><a href="printer-settings.html.htm">Printer</a></li>
                                    <li><a href="pos-settings.html.htm">POS</a></li>
                                    <li><a href="custom-fields.html.htm">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>System Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="email-settings.html.htm">Email</a></li>
                                    <li><a href="sms-gateway.html.htm">SMS Gateways</a></li>
                                    <li><a href="otp-settings.html.htm">OTP</a></li>
                                    <li><a href="gdpr-settings.html.htm">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Financial Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payment-gateway-settings.html.htm">Payment Gateway</a></li>
                                    <li><a href="bank-settings-grid.html.htm">Bank Accounts</a></li>
                                    <li><a href="tax-rates.html.htm">Tax Rates</a></li>
                                    <li><a href="currency-settings.html.htm">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Other Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="storage-settings.html.htm">Storage</a></li>
                                    <li><a href="ban-ip-address.html.htm">Ban IP Address</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                            <li><a href="javascript:void(0);"><span>Changelog v2.0.3</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Multi Level</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Level 1.1</a></li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 2.1</a></li>
                                            <li class="submenu submenu-two submenu-three"><a
                                                    href="javascript:void(0);">Level 2.2<span
                                                        class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                <ul>
                                                    <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                    <li><a href="javascript:void(0);">Level 3.2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-widget w-100">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
                                <h6>Total Purchase Due</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-widget dash1 w-100">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
                                <h6>Total Sales Due</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-widget dash2 w-100">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="385656.50">$385,656.50</span></h5>
                                <h6>Total Sale Amount</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-widget dash3 w-100">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="40000.00">$400.00</span></h5>
                                <h6>Total Expense Amount</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Customers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>110</h4>
                                <h5>Suppliers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>150</h4>
                                <h5>Purchase Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <img src="assets/img/icons/file-text-icon-01.svg" class="img-fluid"
                                    alt="icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>170</h4>
                                <h5>Sales Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Purchase & Sales</h5>
                                <div class="graph-sets">
                                    <ul class="mb-0">
                                        <li>
                                            <span>Sales</span>
                                        </li>
                                        <li>
                                            <span>Purchase</span>
                                        </li>
                                    </ul>
                                    <div class="dropdown dropdown-wraper">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            2023
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales_charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill default-cover mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Recent Products</h4>
                                <div class="view-all-link">
                                    <a href="javascript:void(0);" class="view-all d-flex align-items-center">
                                        View All<span class="ps-2 d-flex align-items-center"><i
                                                data-feather="arrow-right" class="feather-16"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table dashboard-recent-products">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Products</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="productimgname">
                                                    <a href="product-list.html.htm" class="product-img">
                                                        <img src="assets/img/products/stock-img-01.png"
                                                            alt="product">
                                                    </a>
                                                    <a href="product-list.html.htm">Lenevo 3rd Generation</a>
                                                </td>
                                                <td>$12500</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="productimgname">
                                                    <a href="product-list.html.htm" class="product-img">
                                                        <img src="assets/img/products/stock-img-06.png"
                                                            alt="product">
                                                    </a>
                                                    <a href="product-list.html.htm">Bold V3.2</a>
                                                </td>
                                                <td>$1600</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="productimgname">
                                                    <a href="product-list.html.htm" class="product-img">
                                                        <img src="assets/img/products/stock-img-02.png"
                                                            alt="product">
                                                    </a>
                                                    <a href="product-list.html.htm">Nike Jordan</a>
                                                </td>
                                                <td>$2000</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="productimgname">
                                                    <a href="product-list.html.htm" class="product-img">
                                                        <img src="assets/img/products/stock-img-03.png"
                                                            alt="product">
                                                    </a>
                                                    <a href="product-list.html.htm">Apple Series 5 Watch</a>
                                                </td>
                                                <td>$800</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Expired Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table dashboard-expired-products">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Manufactured Date</th>
                                        <th>Expired Date</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-01.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Red Premium Handy </a>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">PT006</a></td>
                                        <td>17 Jan 2023</td>
                                        <td>29 Mar 2023</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class=" confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-02.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Iphone 14 Pro</a>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">PT007</a></td>
                                        <td>22 Feb 2023</td>
                                        <td>04 Apr 2023</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-03.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Black Slim 200 </a>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">PT008</a></td>
                                        <td>18 Mar 2023</td>
                                        <td>13 May 2023</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class=" confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-04.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Woodcraft Sandal</a>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">PT009</a></td>
                                        <td>29 Mar 2023</td>
                                        <td>27 May 2023</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class=" confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-03.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Apple Series 5 Watch </a>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);">PT010</a></td>
                                        <td>24 Mar 2023</td>
                                        <td>26 May 2023</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit-units">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class=" confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="customizer-links" id="setdata">
            <ul class="sticky-sidebar">
                <li class="sidebar-icons">
                    <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-original-title="Theme">
                        <i data-feather="settings" class="feather-five"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/plugins/apexchart/apexcharts.min.js') }}">
    </script>
    <script src="{{ asset('assets/' . config('template.admin.asset') . '/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/plugins/sweetalert/sweetalert2.all.min.js') }}">
    </script>
    <script src="{{ asset('assets/' . config('template.admin.asset') . '/plugins/sweetalert/sweetalerts.min.js') }}">
    </script>

    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/theme-script.js') }}"></script>
    <script src="{{ asset('assets/' . config('template.admin.asset') . '/js/script.js') }}"></script>
    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="d7958408e99dcbcfdaf236d0-|49" defer=""></script>
</body>

</html>
