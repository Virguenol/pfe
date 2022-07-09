<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="images/logo.png" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="images/logo.png" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal"></h5>
              <span></span>
            </div>
          </div>
         
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/redirect')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Tableau de bord</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Produits</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Ajouter le produit</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/index_product')}}">Afficher le produit</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items"> 
        <a class="nav-link" href="{{ route('view_category')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Categories</span>
        </a>
      </li>
      <li class="nav-item menu-items"> 
        <a class="nav-link" href="{{ url('order')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Commande</span>
        </a>
      </li>
    </ul>
  </nav>