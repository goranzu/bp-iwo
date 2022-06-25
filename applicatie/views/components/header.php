<header>
    <div class="logo">
        <p class="logo-text">
            <a href="/">flet<span class="uppercase">nix</span></a>
        </p>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <nav class="main-nav">
            <ul>
                <li class=<?php echo $current_page === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                <li class=<?php echo $current_page === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About
                        Us</a></li>
                <!-- <li class=<?php echo $current_page === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
            </ul>
        </nav>
        <div class="user">
            <p class="fs-300 fs-italic id-email">
                <?= $_SESSION['email'] ?>
            </p>
            <form action="/functions/logout.php" method="post">
                <button type="submit" class="logout-btn fs-300 fs-italic">Logout</button>
            </form>
        </div>
    <?php
    } else {
    ?>
        <nav class="main-nav">
            <ul>
                <li class=<?php echo $current_page === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                <li class=<?php echo $current_page === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About
                        Us</a></li>
                <!-- <li class=<?php echo $current_page === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
                <li class=<?php echo $current_page === 'register.php' ? "active" : "inactive"; ?>>
                    <a href="/register.php">Register</a>
                </li>
                <li class=<?php echo $current_page === 'login.php' ? "active" : "inactive"; ?>>
                    <a href="/login.php">Login</a>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>
</header>