<!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="<?php echo base_url() ?>assets/img/logo_white.png" alt="logo" class="brand" data-src="<?php echo base_url() ?>assets/img/logo_white.png" data-src-retina="<?php echo base_url() ?>assets/img/logo_white_2x.png" width="78" height="22">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <?php
          //print_r($leftsidemenuitems);
          foreach ($leftsidemenuitems as $key => $leftsidemenuitem) {
            if(count($leftsidemenuitem->children) == 0){
              echo '<li class="m-t-30 ">
            <a href="/dashboard">
              <span class="title">'.$leftsidemenuitem->Name.'</span>
            </a>
            <span class="bg-success icon-thumbnail">'.ucfirst(mb_substr($leftsidemenuitem->Name,0,2)).'</span>
          </li>';
            }else{
              echo '<li>
            <a href="javascript:;"><span class="title">'.$leftsidemenuitem->Name.'</span>
            <span class=" arrow"></span></a>
            <span class="bg-success icon-thumbnail">'.ucfirst(mb_substr($leftsidemenuitem->Name,0,2)).'</span>
            <ul class="sub-menu">';
              foreach ($leftsidemenuitem->children as $key => $child) {
                if(count($child->children) == 0){
              echo '<li class="">
                <a href="/'.$child->URI.'">'.$child->Name.'</a>
                <span class="bg-success icon-thumbnail">'.ucfirst(mb_substr($child->Name,0,2)).'</span>
              </li>';
            }else{
              echo '<li>
            <a href="javascript:;"><span class="title">'.$child->Name.'</span>
            <span class="arrow"></span></a>
            <span class="bg-success icon-thumbnail">'.ucfirst(mb_substr($child->Name,0,2)).'</span>
            <ul class="sub-menu">';
              foreach ($child->children as $key => $grandchild) {
              echo '<li class="">
                <a href="/'.$grandchild->URI.'">'.$grandchild->Name.'</a>
                <span class="bg-success icon-thumbnail">'.ucfirst(mb_substr($grandchild->Name,0,2)).'</span>
              </li>';
            }
            echo '</ul>
          </li>';
            }
            }
            echo '</ul>
          </li>';
            }
          }
          ?>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->