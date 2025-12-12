<aside class="sidebar">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div class="text-center">
        <a href="{{ route('index') }}" class="sidebar-logo p-2 bg-white rounded-full inline-block">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
        <span class="text-[#fe6d04] font-bold block text-center mt-2 text-sm uppercase">ARAM ENTERPRISE</span>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customerCreation') }}" class="{{ Route::is('customerCreation') || Route::is('addUser') || Route::is('formValidation') || Route::is('imageUpload') || Route::is('viewUser') ? 'active-page' : '' }}">
                    <iconify-icon icon="mage:users" class="menu-icon"></iconify-icon>
                    <span>Customer Creation</span>
                </a>
            </li>
            <li>
                <a href="{{ route('chitCreation') }}">
                    <iconify-icon icon="mage:checklist" class="menu-icon"></iconify-icon>
                    <span>Chit Creation</span>
                </a>
            </li>
            <li>
                <a href="{{ route('paymentCollection') }}">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Payment Collection</span>
                </a>
            </li>
            <li>
                <a href="{{ route('calendarMain') }}">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Calendar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports') }}">
                    <iconify-icon icon="mage:chart" class="menu-icon"></iconify-icon>
                    <span>Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ route('viewProfile') }}">
                    <iconify-icon icon="mage:user-cross" class="menu-icon"></iconify-icon>
                    <span>User Accounts</span>
                </a>
            </li>

        </ul>
    </div>
</aside>