<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-primary border-r border-primary md:translate-x-0"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-primary text-white fill-white font-bold">
        <ul class="space-y-2">
            <li>
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-base rounded-lg hover:bg-white hover:fill-contrary hover:text-contrary group {{ request()->getUri() === route('admin.dashboard') ? 'bg-white fill-contrary text-contrary' : '' }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                              d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z"
                              clip-rule="evenodd"/>
                        <path fill-rule="evenodd"
                              d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-3">Overview</span>
                </a>
            </li>
            <li>
                <button
                    type="button"
                    class="flex items-center p-2 w-full text-base rounded-lg transition duration-75 group hover:bg-white hover:text-contrary {{ request()->is('control-panel/user*') || request()->is('control-panel/application*') ? 'text-contrary bg-white' : '' }}"
                    aria-controls="dropdown-pages"
                    data-collapse-toggle="dropdown-pages"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                              d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                              clip-rule="evenodd"/>
                        <path
                            d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                    >User</span
                    >
                    <svg
                        aria-hidden="true"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <ul id="dropdown-pages"
                    class="py-2 space-y-2 {{ request()->is('control-panel/user*') || request()->is('control-panel/application*') ? '' : 'hidden' }}">
                    <li>
                        <a
                            href="{{ route('admin.user.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base hover:fill-contrary hover:text-contrary rounded-lg transition duration-75 group hover:bg-white {{ request()->getUri() === route('admin.user.index') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Management Console</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.user.create') }}"
                            class="flex items-center p-2 pl-11 w-full text-base rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.user.create') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Register new User</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.user.member') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.user.member') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Member</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.user.author') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.user.author') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Author</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.application.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.application.index') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Author Application</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.token.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.token.index') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Token Management</a
                        >
                    </li>
                </ul>
            </li>
            <li>
                <button
                    type="button"
                    class="flex items-center p-2 w-full text-base rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->is('control-panel/user*') || request()->is('control-panel/post*') ? 'fill-contrary text-contrary bg-white' : '' }}"
                    aria-controls="dropdown-sales"
                    data-collapse-toggle="dropdown-sales"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                    >Post</span
                    >
                    <svg
                        aria-hidden="true"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <ul id="dropdown-sales"
                    class="py-2 space-y-2 {{ request()->is('control-panel/post*') ? '' : 'hidden' }}">
                    <li>
                        <a
                            href="{{ route('admin.post.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.post.index') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >List</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.submission.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base   rounded-lg transition duration-75 group hover:bg-white hover:fill-contrary hover:text-contrary {{ request()->getUri() === route('admin.submission.index') ? 'bg-white fill-contrary text-contrary' : '' }}"
                        >Submission</a
                        >
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
