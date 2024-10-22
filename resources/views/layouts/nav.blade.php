<header id="navbar" class="bg-zinc-800 p-4 bg-opacity-80 z-50 relative sticky top-0 w-full transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo / Brand Name -->
        <div class="text-white text-2xl font-bold">
            <a href="/" class="hover:text-blue-500 transition">Jamie Dovaston</a>
        </div>

        <!-- Hamburger Menu (visible on smaller screens) -->
        <div class="lg:hidden">
            <button id="menu-btn" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Navigation Menu (Large Screens) -->
        <nav id="menu" class="hidden lg:flex items-center space-x-6">
            <a href="/projects" class="text-white font-medium hover:text-blue-500 transition">Projects</a>
            <a href="/contact" class="text-white font-medium hover:text-blue-500 transition">Contact</a>
            <a href="/about-me" class="text-white font-medium px-4 py-2 rounded ring-2 ring-blue-800 hover:bg-blue-800 hover:ring-blue-900 transition">
                About Me
            </a>
        </nav>
    </div>

    <!-- Dropdown Menu (Small Screens) -->
    <div id="dropdown" class="hidden lg:hidden bg-zinc-800 p-4 absolute right-0 w-auto max-w-xs">
        <a href="/projects" class="block text-white font-medium hover:text-blue-500 transition mb-2">Projects</a>
        <a href="/contact" class="block text-white font-medium hover:text-blue-500 transition mb-2">Contact</a>
        <a href="/about-me" class="block text-white font-medium px-4 py-2 rounded ring-2 ring-blue-800 hover:bg-blue-800 hover:ring-blue-900 transition">
            About Me
        </a>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const dropdown = document.getElementById('dropdown');
    const navbar = document.getElementById('navbar');
    let lastScrollTop = 0;
    const scrollThreshold = 10; // Adjust this value for the desired scroll distance

    // Toggle dropdown on small screens
    menuBtn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    // Hide navbar on scroll down, show on scroll up
    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop + scrollThreshold) {
            navbar.classList.add('-translate-y-full');  // hide when scrolling down beyond threshold
        } else if (scrollTop < lastScrollTop - scrollThreshold) {
            navbar.classList.remove('-translate-y-full'); // show when scrolling up beyond threshold
        }

        lastScrollTop = scrollTop;
    });
</script>

