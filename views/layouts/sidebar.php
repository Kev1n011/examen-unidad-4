<?php


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$user_sidebar = $_SESSION['user_data']
?>


<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="<?= BASE_PATH ?>home" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="<?= BASE_PATH ?>assets/images/logo-dark.svg" alt="logo image" />
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>

            Navigation
          </label>
          <i class="ph-duotone ph-gauge"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-gauge"></i>
            </span>
            <span class="pc-mtext">Dashboard</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            <span class="pc-badge">2</span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../dashboard/index.html">Analytics</a></li>
            <li class="pc-item"><a class="pc-link" href="../dashboard/affiliate.html">Affiliate</a></li>
            <li class="pc-item"><a class="pc-link" href="../dashboard/finance.html">Finance</a></li>
            <li class="pc-item"><a class="pc-link" href="../admins/helpdesk-dashboard.html">Helpdesk</a></li>
            <li class="pc-item"><a class="pc-link" href="../dashboard/invoice.html">Invoice</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"> <i class="ph-duotone ph-layout"></i></span><span
              class="pc-mtext">Layouts</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../demo/layout-horizontal.html">Horizontal</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-vertical.html">Vertical</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-vertical-tab.html">Vertical + Tab</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-tab.html">Tab</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-2-column.html">2 Column</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-big-compact.html">Big Compact</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-compact.html">Compact</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-moduler.html">Moduler</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-creative.html">Creative</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-detached.html">Detached</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-advanced.html">Advanced</a></li>
            <li class="pc-item"><a class="pc-link" href="../demo/layout-extended.html">Extended</a></li>
          </ul>
        </li>
        <li class="pc-item pc-caption">
          <label>Widget</label>
          <i class="ph-duotone ph-chart-pie"></i>
        </li>
        <li class="pc-item">
          <a href="<?= BASE_PATH ?>products/" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-projector-screen-chart"></i>
            </span>
            <span class="pc-mtext">
              Productos
            </span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_user.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-identification-card"></i>
            </span>
            <span class="pc-mtext">User</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_data.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-database"></i>
            </span>
            <span class="pc-mtext">Data</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../widget/w_chart.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-chart-pie"></i>
            </span>
            <span class="pc-mtext">Chart</span></a>
        </li>
        <li class="pc-item pc-caption">
          <label>Application</label>
          <i class="ph-duotone ph-buildings"></i>
        </li>
        <li class="pc-item">
          <a href="../application/calendar.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-calendar-blank"></i>
            </span>
            <span class="pc-mtext">Calendar</span></a>
        </li>
        <li class="pc-item">
          <a href="../application/chat.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-chats-circle"></i>
            </span>
            <span class="pc-mtext">Chat</span></a>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-user-circle"></i>
            </span>
            <span class="pc-mtext">Clients</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="<?= BASE_PATH ?>clients/client_list/page/1">Client List</a></li>
            <li class="pc-item"><a class="pc-link" href="../application/user-card.html">User Card</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-user-circle"></i>
            </span>
            <span class="pc-mtext">Users</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../application/account-profile.html">Account Profile</a></li>
            <li class="pc-item"><a class="pc-link" href="../application/social-media.html">Social media</a></li>
            <li class="pc-item"><a class="pc-link" href="../application/user-card.html">User Card</a></li>
            <li class="pc-item"><a class="pc-link" href="<?= BASE_PATH ?>users/user_list/page/1">User List</a></li>
            <li class="pc-item"><a class="pc-link" href="../application/team.html">Team</a></li>
          </ul>
        </li>

        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-text-columns"></i>
            </span>
            <span class="pc-mtext">Data table</span><span class="pc-arrow"><i
                data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../table/dt_advance.html">Advance initialization</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_styling.html">Styling</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_api.html">API</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_plugin.html">Plug-in</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_sources.html">Data sources</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-wall"></i>
            </span>
            <span class="pc-mtext">DT extensions</span><span class="pc-arrow"><i
                data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_autofill.html">Autofill</a></li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Button<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="../table/dt_ext_basic_buttons.html">Basic button</a></li>
                <li class="pc-item"><a class="pc-link" href="../table/dt_ext_export_buttons.html">Data export</a></li>
              </ul>
            </li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_col_reorder.html">Col reorder</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_fixed_columns.html">Fixed columns</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_fixed_header.html">Fixed header</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_key_table.html">Key table</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_responsive.html">Responsive</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_row_reorder.html">Row reorder</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_scroller.html">Scroller</a></li>
            <li class="pc-item"><a class="pc-link" href="../table/dt_ext_select.html">Select table</a></li>
          </ul>
        </li>
        <li class="pc-item pc-caption">
          <label>Charts &amp; Maps</label>
          <i class="ph-duotone ph-chart-pie-slice"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-chart-donut"></i>
            </span>
            <span class="pc-mtext">Charts</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../chart/chart-apex.html">Apex Chart</a></li>
            <li class="pc-item"><a class="pc-link" href="../chart/chart-peity.html">Peity Chart</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-map-trifold"></i>
            </span>
            <span class="pc-mtext">Maps</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../chart/map-vector.html">Vector Map</a></li>
            <li class="pc-item"><a class="pc-link" href="../chart/map-gmap.html">Gmaps</a></li>
          </ul>
        </li>

        <li class="pc-item pc-caption">
          <label>Other</label>
          <i class="ph-duotone ph-suitcase"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"> <i class="ph-duotone ph-tree-structure"></i> </span><span
              class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="pc-item"><a href="sample-page.html" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-desktop"></i>
            </span>
            <span class="pc-mtext">Sample page</span></a></li>

      </ul>
      <div class="card nav-action-card bg-brand-color-4">
        <div class="card-body" style="background-image: url('<?= BASE_PATH ?>assets/images/layout/nav-card-bg.svg')">
          <h5 class="text-dark">Help Center</h5>
          <p class="text-dark text-opacity-75">Please contact us for more questions.</p>
          <a href="https://phoenixcoded.support-hub.io/" class="btn btn-primary" target="_blank">Go to help Center</a>
        </div>
      </div>
    </div>
    <div class="card pc-user-card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
            <img src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg" alt="user-image"
              class="user-avtar wid-45 rounded-circle" />
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="dropdown">
              <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                data-bs-offset="0,20">
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1 me-2">
                    <h6 class="mb-0"><?php echo $user_sidebar['name'] ?></h6>
                    <small><?php echo $user_sidebar['role'] ?></small>
                  </div>
                  <div class="flex-shrink-0">
                    <div class="btn btn-icon btn-link-secondary avtar">
                      <i class="ph-duotone ph-windows-logo"></i>
                    </div>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu">
                <ul>
                  <li>
                    <a href="<?= BASE_PATH ?>/my_account/<?php echo str_replace(' ', '-', $user_sidebar['name']); ?>/<?php echo $user_sidebar['id'] ?>"
                      class="pc-user-links">

                      <i class="ph-duotone ph-user"></i>
                      <span>My Account</span>
                    </a>
                  </li>
                  <li>
                    <a class="pc-user-links">
                      <i class="ph-duotone ph-gear"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="pc-user-links">
                      <i class="ph-duotone ph-lock-key"></i>
                      <span>Lock Screen</span>
                    </a>
                  </li>
                  <li>
                    <form method="POST" action="<?= BASE_PATH ?>/app/AuthController.php" id="logout">
                      <input type="hidden" name="enviar" value="logout">
                      <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

                      <a class="pc-user-links"onclick="document.getElementById('logout').submit();">
                        <i class="ph-duotone ph-power"></i>
                        <span>Logout</span>
                      </a>
                    </form>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->