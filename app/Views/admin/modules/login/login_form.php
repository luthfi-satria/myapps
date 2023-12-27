<?= $this->extend('admin/main_template'); ?>
<?= $this->section('section'); ?>
<div id="login_class" class="flex justify-center w-full h-screen bg-no-repeat bg-cover" style="background-image: url('<?php echo base_url('assets/images/login/desktopbg.jpg');?>');">
    <div 
        class="w-full md:w-1/2 lg:w-1/3 pt-4 px-2"
    >
        <h1 class="text-center font-extrabold text-2xl p-2 text-white tracking-widest italic mb-4">
            <span class="text-red-400">L</span>USARA <span class="text-red-400">P</span>ROJECTS
        </h1>
        <form id="loginForm" 
            method="POST" 
            autocomplete="off"
            class="rounded-md p-4 bg-gray-800 bg-opacity-30 box-border shadow-md shadow-white relative"
            data-url="<?php echo current_url();?>"
            >
            <h1 class="text-2xl text-white tracking-wider text-center p-8 font-bold">
                <span class="text-red-400">L</span>OGIN <span class="text-red-400">A</span>CCOUNT
            </h1>
            <div class="relative text-gray-500 mb-5">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <i class="fa fa-user-circle"></i>
                </div>
                <input 
                    type="text" 
                    id="input-group-1" 
                    name="email"
                    class="bg-white text-gray-500 text-sm rounded-lg block w-full ps-10 p-2.5 outline-none" 
                    placeholder="name@mysite.com" 
                    onchange=""
                />
            </div>

            <div class="relative text-gray-500 mb-5">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <i class="fa fa-key"></i>
                </div>
                <input 
                    type="password" 
                    name="password"
                    id="input-group-2" 
                    class="bg-white text-gray-500 text-sm rounded-lg block w-full ps-10 p-2.5 outline-none" 
                    placeholder="Password" />
            </div>
            <button
                type="button"
                class="w-full font-bold bg-transparent border hover:border-white p-2 text-lg text-white rounded-md hover:bg-gray-700 hover:bg-opacity-30"
                onclick="LoginAccount()"
            >
                Sign In
            </button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/login.js');?>"></script>
<?= $this->endSection(); ?>