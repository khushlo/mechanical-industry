<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4 class="sidebar-title">
            <i class="fas fa-cogs me-2"></i>
            Admin Panel
        </h4>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" 
                   href="dashboard.php">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?>" 
                   href="products.php">
                    <i class="fas fa-boxes me-2"></i>
                    Products
                    <span class="badge bg-primary ms-auto"><?php echo $stats['products'] ?? '0'; ?></span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'active' : ''; ?>" 
                   href="categories.php">
                    <i class="fas fa-tags me-2"></i>
                    Categories
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" 
                   href="services.php">
                    <i class="fas fa-cogs me-2"></i>
                    Services
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'industries.php' ? 'active' : ''; ?>" 
                   href="industries.php">
                    <i class="fas fa-industry me-2"></i>
                    Industries
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'active' : ''; ?>" 
                   href="gallery.php">
                    <i class="fas fa-images me-2"></i>
                    Gallery
                </a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="collapse" 
                   data-bs-target="#websiteMenu" aria-expanded="false">
                    <i class="fas fa-globe me-2"></i>
                    Website
                </a>
                <div class="collapse" id="websiteMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>
                                View Website
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>" 
                               href="settings.php">
                                <i class="fas fa-cog me-2"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>