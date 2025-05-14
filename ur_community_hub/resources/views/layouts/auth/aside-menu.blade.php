<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-20 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gradient-to-b from-blue-500 to-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gradient-to-b from-blue-500 to-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i
                        class="w-5 h-5 text-gray-500 transition duration-75 fa fa-tachometer-alt dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            @php
                $userRole = Auth::user()->user_role;
            @endphp

            @if ($userRole === App\Enums\UserRole::UR_Community_Staff->value)
                <div class="py-2 space-y-1">
                    <x-responsive-nav-link :href="route('community-requests.index')" :active="request()->routeIs('admin.community-requests.*')">
                        <i class="mr-2 fa fa-list-alt"></i>
                        {{ __('Community Requests') }}
                    </x-responsive-nav-link>
                </div>
            @endif

            @if ($userRole === App\Enums\UserRole::UR_Community_Staff->value)
                <li>
                    <a href="{{ route('communities.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="w-5 h-5 text-gray-500 transition duration-75 fa fa-users shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Community</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('TermsAndCondition') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="w-5 h-5 text-gray-500 transition duration-75 fa fa-file-contract shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Terms And Condition</span>
                    </a>
                </li>

                
                <li>
                    <a href="{{ route('contacts.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="w-5 h-5 text-gray-500 transition duration-75 fa fa-file-contract shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">FeedBack  Message</span>
                    </a>
                </li>
            @endif

            @if ($userRole === App\Enums\UserRole::Community_Leader->value)

                <li>
                    <a href="{{ route('community-profile') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="w-5 h-5 text-gray-500 transition duration-75 fa fa-users shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Community Profile</span>
                    </a>
                </li>
                @if (auth()->user()->communityProfile && auth()->user()->communityProfile->status == 1)
                    <li>
                        <a href="{{ route('event-profile') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="w-5 h-5 text-gray-500 transition duration-75 fa fa-calendar-alt shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Community Events</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('member-request-index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="w-5 h-5 text-gray-500 transition duration-75 fa fa-calendar-alt shrink-0 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Member Request</span>
                        </a>
                    </li>
                @endif

            @endif
        </ul>
    </div>
</aside>