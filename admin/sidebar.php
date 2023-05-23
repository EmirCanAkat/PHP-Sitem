
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" title="CRAD Coming Soon & Maintaince Mode Admin Panel">
      <img src="./assets/img/logo-icon.png"
           alt="CRAD Logo"
           class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">CRAD Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/img/visit-web.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../" class="d-block" target="_blank">Siteye Gidin!</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Kontrol Paneli
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=general-settings" class="nav-link <?php echo (("general-settings" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Genel Ayarlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=design-templates" class="nav-link <?php echo (("design-templates" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-palette nav-icon"></i>
                  <p>Tasarım ve Şablonlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=about-page" class="nav-link <?php echo (("about-page" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Sayfa Hakkında</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=contact-page" class="nav-link <?php echo (("contact-page" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>İletişim Sayfası</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=subscribers" class="nav-link <?php echo (("subscribers" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Aboneler</p>
                </a>
</li>
              <li class="nav-item">
                <a href="?p=user-pass" class="nav-link <?php echo (("user-pass" == $page)) ? 'active' : ''; ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Admin E-Mail & Şifre</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>