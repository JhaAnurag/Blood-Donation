</main>
    <!-- Footer -->
    <footer class="bg-primary-dark dark:bg-[#1E1E1E] text-white py-6 mt-12 transition-colors duration-200">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-3">LifeFlow</h3>
                    <p class="max-w-xs">Connecting blood donors with those in need. Save lives through the gift of blood donation.</p>
                </div>
                <div class="mb-6 md:mb-0">
                    <h4 class="font-semibold mb-3">Quick Links</h4>
                    <ul>
                        <li class="mb-2"><a href="<?php echo $base_url; ?>index.php" class="hover:text-accent-light transition">Home</a></li>
                        <li class="mb-2"><a href="<?php echo $base_url; ?>search.php" class="hover:text-accent-light transition">Search Donors</a></li>
                        <li class="mb-2"><a href="<?php echo $base_url; ?>camps.php" class="hover:text-accent-light transition">Blood Camps</a></li>
                        <li class="mb-2"><a href="<?php echo $base_url; ?>request.php" class="hover:text-accent-light transition">Request Blood</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Contact</h4>
                    <ul>
                        <li class="mb-2"><i class="fas fa-envelope mr-2"></i> contact@lifeflow.org</li>
                        <li class="mb-2"><i class="fas fa-phone mr-2"></i> +1-800-BLOOD-HELP</li>
                    </ul>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="hover:text-accent-light transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-accent-light transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-accent-light transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-primary-light/30 dark:border-gray-700 mt-6 pt-6 text-center">
                <p>&copy; <?php echo date('Y'); ?> Blood Donation Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <div id="mouse-follower"></div> <!-- Add the blob element -->

    <?php
    // Include the floating chatbot at the very end of the body to ensure it's always on top
    include_once INCLUDES_PATH . 'components/floating_chatbot.php';
    ?>

    <!-- Chart.js for Analytics Dashboard -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Optional - Chart.js plugin for animations and advanced features -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        // Hamburger menu toggle for desktop
        const hamburgerMenu = document.getElementById('hamburger-menu');
        const hamburgerDropdown = document.getElementById('hamburger-dropdown');
        
        if (hamburgerMenu && hamburgerDropdown) {
            // Click event
            hamburgerMenu.addEventListener('click', function(e) {
                e.stopPropagation();
                hamburgerDropdown.classList.toggle('hidden');
            });
            
            // Add hover event listeners
            hamburgerMenu.addEventListener('mouseenter', function() {
                hamburgerDropdown.classList.remove('hidden');
            });
            
            // Add event listener to the dropdown to keep it open when hovered
            hamburgerDropdown.addEventListener('mouseenter', function() {
                hamburgerDropdown.classList.remove('hidden');
            });
            
            // Hide dropdown when mouse leaves both the hamburger menu and the dropdown
            hamburgerDropdown.addEventListener('mouseleave', function() {
                hamburgerDropdown.classList.add('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                if (hamburgerDropdown && !hamburgerDropdown.classList.contains('hidden')) {
                    hamburgerDropdown.classList.add('hidden');
                }
            });
        }

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            // Click event for mobile menu
            mobileMenuButton.addEventListener('click', () => {
                // Toggle show class for animation instead of just hidden
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    // Give a tiny delay before adding show class to trigger transition
                    setTimeout(() => {
                        mobileMenu.classList.add('show');
                    }, 10);
                } else {
                    mobileMenu.classList.remove('show');
                    // Wait for animation to complete before hiding
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300); // Match this with the CSS transition duration
                }
            });
            
            // Add hover functionality for mobile menu
            mobileMenuButton.addEventListener('mouseenter', () => {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.add('show');
                }, 10);
            });
            
            // Keep the menu open when hovering over it
            mobileMenu.addEventListener('mouseenter', () => {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('show');
            });
            
            // Hide menu when mouse leaves both the button and menu
            mobileMenu.addEventListener('mouseleave', () => {
                // Only hide if we're not on a touch device that just triggered hover
                if (!('ontouchstart' in window)) {
                    mobileMenu.classList.remove('show');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.remove('show');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
            });
        }

        // Mouse follower logic
        const follower = document.getElementById('mouse-follower');
        if (follower) {
            document.addEventListener('mousemove', (e) => {
                requestAnimationFrame(() => {
                    // Use pageX/pageY for correct positioning during scroll
                    follower.style.left = `${e.pageX}px`;
                    follower.style.top = `${e.pageY}px`;
                    follower.style.opacity = '1';
                });
            });

            document.addEventListener('mouseleave', () => {
                follower.style.opacity = '0';
            });

            document.addEventListener('mouseenter', () => {
                follower.style.opacity = '1';
            });
        }
    </script>
</body>
</html>