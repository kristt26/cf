<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li ng-class="{'nav-item menu-open': breadcrumb=='Penyakit' || breadcrumb=='Gejala' || breadcrumb=='Pengetahuan', 'nav-item': breadcrumb!='Penyakit' || breadcrumb!='Gejala' 
         || breadcrumb!='Pengetahuan'}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('admin/penyakit')?>"
                        ng-class="{'nav-link active': breadcrumb=='Penyakit', 'nav-link': breadcrumb!='Penyakit'}">
                        <i class="fas fa-laptop-medical nav-icon"></i>
                        <p>Penyakit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/gejala')?>"
                        ng-class="{'nav-link active': breadcrumb=='Gejala', 'nav-link': breadcrumb!='Gejala'}">
                        <i class="fa fa-eye-dropper nav-icon"></i>
                        <p>Gejala</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pengetahuan')?>"
                        ng-class="{'nav-link active': breadcrumb=='Pengetahuan', 'nav-link': breadcrumb!='Pengetahuan'}">
                        <i class="fa fa-flask nav-icon"></i>
                        <p>Pengetahuan</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>