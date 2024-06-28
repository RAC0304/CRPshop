   <header>
       <div class="container">
           <nav class="navbar">
               <a href="../index.php" class="navbar-brand">
                   <img src="../img/logoputih.png" alt="Logo" />
               </a>
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a href="../index.php"
                            <?php
                            // Periksa apakah pengguna sudah login
                            if (isset($_SESSION['username'])) {
                                $username = $_SESSION['username'];
                                echo '<li class="login-btn">';
                                echo '<a href="#" class="btn">';
                                echo "$username"; // Tampilkan nama pengguna atau teks sesuai kebutuhan
                                echo '</a>';
                                echo '</li>';
                            } else {
                                // Jika belum login, tampilkan tautan Login seperti semula
                                echo '<li class="login-btn">';
                                echo '<a href="login.php" class="btn">Login';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">';
                                echo '<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />';
                                echo '<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />';
                                echo '</svg>';
                                echo '</a>';
                                echo '</li>';
                            }
                            ?>
                        </a>
                   </li>
                   <li class="login-btn">
                    <a href="../../login.php" class="btn">Logout
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </a>
                </li>
               </ul>
           </nav>
       </div>
   </header>