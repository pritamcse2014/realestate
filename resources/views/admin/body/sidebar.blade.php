<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" target="_blank" class="sidebar-brand"> Noble<span>UI</span> </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Role</li>
            <li class="nav-item @if(Request::segment(2) === 'users') active @endif">
                <a href="{{ url('admin/users') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'users') active @endif">
                <a href="{{ url('admin/color') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Color</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'order') active @endif">
                <a href="{{ url('admin/order') }}" class="nav-link">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">Order</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'blog') active @endif">
                <a href="{{ url('admin/blog') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Blog</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'blog') active @endif">
                <a href="{{ url('admin/sendPdf') }}" class="nav-link">
                    <i class="link-icon" data-feather="file"></i>
                    <span class="link-title">Send PDF</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'transactions') active @endif">
                <a href="{{ url('admin/transactions') }}" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Transactions</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'calendar') active @endif">
                <a href="{{ url('admin/calendar') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'changePassword') active @endif">
                <a href="{{ url('admin/changePassword') }}" class="nav-link">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">Change Password</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'discountCode') active @endif">
                <a href="{{ url('admin/discountCode') }}" class="nav-link">
                    <i class="link-icon" data-feather="percent"></i>
                    <span class="link-title">Discount Code</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'support') active @endif">
                <a href="{{ url('admin/support') }}" class="nav-link">
                    <i class="link-icon" data-feather="help-circle"></i>
                    <span class="link-title">Support</span>
                </a>
            </li>
            <li class="nav-item nav-category">User Week</li>
            <li class="nav-item @if(Request::segment(2) === 'week') active @endif">
                <a href="{{ url('admin/week') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Week</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'time') active @endif">
                <a href="{{ url('admin/time') }}" class="nav-link">
                    <i class="link-icon" data-feather="clock"></i>
                    <span class="link-title">Week Time</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'schedule') active @endif">
                <a href="{{ url('admin/schedule') }}" class="nav-link">
                    <i class="link-icon" data-feather="watch"></i>
                    <span class="link-title">Schedule</span>
                </a>
            </li>
            <li class="nav-item nav-category">Address</li>
            <li class="nav-item @if(Request::segment(2) === 'countries') active @endif">
                <a href="{{ url('admin/countries') }}" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Countries</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'state') active @endif">
                <a href="{{ url('admin/state') }}" class="nav-link">
                    <i class="link-icon" data-feather="map-pin"></i>
                    <span class="link-title">State</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'city') active @endif">
                <a href="{{ url('admin/city') }}" class="nav-link">
                    <i class="link-icon" data-feather="map"></i>
                    <span class="link-title">City</span>
                </a>
            </li>
            <li class="nav-item @if(Request::segment(2) === 'address') active @endif">
                <a href="{{ url('admin/address') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Address</span>
                </a>
            </li>
            <li class="nav-item nav-category">Notification</li>
            <li class="nav-item @if(Request::segment(2) === 'notification') active @endif">
                <a href="{{ url('admin/notification') }}" class="nav-link">
                    <i class="link-icon" data-feather="bell"></i>
                    <span class="link-title">Push Notification</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/qrcode') }}" class="nav-link">
                    <i class="link-icon" data-feather="camera"></i>
                    <span class="link-title">QRCode</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/smtp') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">SMTP</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/email/compose') }}" class="nav-link">Compose</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/email/sent') }}" class="nav-link">Sent</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- partial -->