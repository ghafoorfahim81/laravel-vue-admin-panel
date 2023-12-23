<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ml-2  md:mr-24 rtl:md:mr-5">
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">DTS</span>
                </a>
            </div>

            <div class="flex items-center ">
                <div class="flex items-center ml-3 relative">
                    <div>
                        <span class="sr-only">Open user menu</span>
                        <span class="material-icons text-slate-700 hover:cursor-pointer" id="notification-icon">
                                notifications
                                </span>
                    </div>
                    <div
                        class="z-50  hidden rtl:left-2 right-4 w-fit rtl:right-auto absolute top-5
                        text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="notification-content">
                        <div id="toast-notification"
                             class=" max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-300"
                             role="alert">
                            <div class="flex items-center mb-3">
                                <span
                                    class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">New notification</span>
                                <button type="button"
                                        class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                        data-dismiss-target="#toast-notification" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center">
                                <div class="relative inline-block shrink-0">
                                    <img class="w-12 h-12 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                         alt="Jese Leos image"/>
                                    <span
                                        class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
                <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 18" fill="currentColor">
                    <path
                        d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z"
                        fill="currentColor"/>
                    <path
                        d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z"
                        fill="currentColor"/>
                    </svg>
                <span class="sr-only">Message icon</span>
            </span>
                                </div>
                                <div class="ms-3 text-sm font-normal">
                                    <div class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</div>
                                    <div class="text-sm font-normal">commented on your photo</div>
                                    <span
                                        class="text-xs font-medium text-blue-600 dark:text-blue-500">a few seconds ago</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                {{--                User menu--}}
                <div class="flex items-center ml-3 relative">
                    <div>
                        <button type="button" id="user-menu-btn"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                 src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div
                        class="z-50 hidden rtl:left-2 right-2 rtl:right-auto absolute top-5 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-menu">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{Auth::user()->name}}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{Auth::user()->user_name}}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">{{__('general_words.dashboard')}}</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">{{__('general_words.settings')}}</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem"
                                   href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                                >{{__('general_words.log_out')}}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="fixed inset-y-1/2 right-4 rtl:right-auto rtl:left-10 transform -translate-y-1/2 z-10">
    <button type="button" id="openSettingModal" data-modal-target="top-right-modal" data-modal-toggle="top-right-modal"
            class="text-white bg-cyan-600 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-xs p-2 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="material-icons spin" id="settingsIcon">settings</i>
    </button>
</div>

