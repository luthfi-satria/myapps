<aside id="logo-sidebar" class="lg:min-h-screen g:left-0 lg:block lg:fixed lg:top-0 lg:bottom-0 lg:overflow-y-auto lg:flex-row lg:flex-nowrap lg:overflow-hidden shadow-xl bg-gray-1 text-gray-600 flex flex-wrap items-center justify-between relative lg:w-64 z-10 py-4" aria-label="Sidebar">
    <div class="lg:flex lg:flex-col lg:items-stretch lg:opacity-100 lg:relative lg:mt-4 lg:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-x-hidden h-auto items-center flex-1 rounded hidden">
        <hr class="mt-7 pt-2 lg:min-w-full"/>
        <h6 class="lg:min-w-full uppercase font-bold block px-4 pt-3 pb-3 no-underline border-b border-gray-200">
            Welcome <span id="welcome_user" class="text-green-600 font-bold">User</span>
        </h6>
        <div class="relative">
            <ul class="sidebar lg:left-0 w-full overflow-y-auto text-md">
                <li class='mt-1 flex items-center px-4 duration-300 cursor-pointer hover:bg-gray-200'>
                    <a href="<?php echo base_url('admin/dashboard');?>" class="flex w-full py-2 items-center">
                        <i class="fa fa-home text-center w-5 opacity-75"></i>
                        <span class="ml-2 overflow-hidden text-ellipsis whitespace-nowrap">
                            Dashboard
                        </span>
                    </a>
                </li>
            </ul>
            <div id="menu_loader" class="hidden w-full h-full absolute top-0 bg-white">
                <ul class="px-4 py-2 animate-pulse">
                    <?php
                        for($i=0; $i < 10; $i++){
                            echo '<li class="mt-1 flex items-center text-xl py-2 duration-300 w-full h-3 bg-gray-300 mb-5 rounded-md">';
                                echo '&nbsp;';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</aside>