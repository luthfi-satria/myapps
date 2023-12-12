<?php
    $profileMenu = [
        [
            'href' => '#',
            'name' => 'Setting',
            'icon' => 'fa fa-cogs',
        ],
        [
            'href' => '#',
            'name' => 'Sign Out',
            'icon' => 'fa fa-sign-out'
        ],
    ];
?>
<nav class="bg-gradient-to-r bg-gray-100 fixed top-0 z-50 w-full text-gray-600 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div id='mynavbar' class="mx-auto max-w-7xl px-2 text-gray-500">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <!-- MOBILE VIEW -->
                <button 
                    class="relative inline-flex items-center justify-center rounded-md p-2  hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    onclick="$('#mob_menu').toggleClass('hidden');"
                >
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <i class="block h-6 w-6 fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start">
                <div class="flex flex-shrink-0 items-start">
                    <span class="hidden md:block text-bold capitalize font-semibold leading-2 text-2xl font-serif ml-2 tracking-widest">
                        MyApps
                    </span>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                <div class="relative ml-3">
                    <div>
                        <button
                            type="button"
                            id="btn-notif"
                            class="nav-btn relative rounded-md text-2xl px-2 py-2 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-white"
                        >
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <i class="fa fa-bell h-6 w-6" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div 
                        id="notifBox"
                        class="absolute hidden text-xs right-0 z-10 mt-2 w-48 origin-top-right rounded-mdpy-1 shadow-lg shadow-gray-500 ring-1 ring-gray-500 ring-opacity-5 focus:outline-none">
                        Notification Box
                    </div>
                </div>
                <div class="relative ml-3">
                    <div>
                        <button id="btn-profile" type="button" class="nav-btn relative rounded-md px-3 py-2 text-2xl hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Profile Menu</span>
                            <!-- <i class="fa fa-user-circle h-6 w-6" aria-hidden="true"></i> -->
                            <img
                                class="h-8 w-auto rounded-full"
                                src="<?php echo base_url('assets/images/icons/images.png');?>"
                                alt="MyApps"
                            />
                        </button>
                    </div>
                    <div 
                        id="myProfile"
                        class="absolute hidden text-xs right-0 z-10 mt-2 w-48 origin-top-right rounded-mdpy-1 shadow-lg shadow-gray-500 ring-1 ring-gray-500 ring-opacity-5 focus:outline-none">
                        <?php
                            foreach($profileMenu as $key => $value){
                                echo '<a href="'.$value['href'].'" class="block uppercase px-4 py-2 tracking-widest hover:bg-gray-100">';
                                    echo '<i class="'.$value['icon'].' mr-2"></i>';
                                    echo $value['name'];
                                echo '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- MOBILE BROWSER ONLY -->
        <div id="mob_menu" class="hidden lg:hidden">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <ul class="border-t-2 border-white">
                    <li class='mt-2 flex items-center px-4 duration-300 cursor-pointer hover:bg-gray-200'>
                        <a
                            href=""
                            class='flex w-full py-2 items-center text-xs'
                            title='dashboard'
                        >
                            <i class="fa fa-home text-center w-5 text-sm opacity-75"></i>
                            <span
                                class='text-[15px] ml-2 overflow-hidden text-ellipsis whitespace-nowrap'
                            >
                                Dashboard
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>