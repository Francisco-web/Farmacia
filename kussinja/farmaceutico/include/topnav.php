<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              
              <ul class=" navbar-right">
                <?php echo $hoje;?><!--Data de hoje exibida no ecrã do usuário-->
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/picture.jpg" alt=""><?php echo $nome;?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="profile.php"><i class="fa fa-user pull-right"></i> Perfil</a>
                    <a class="dropdown-item"  href="../sair.php"><i class="fa fa-sign-out pull-right"></i> Sair</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->