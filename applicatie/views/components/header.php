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
                <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About
                        Us</a></li>
                <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
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
                <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About
                        Us</a></li>
                <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
                <li class=<?php echo $currentPage === 'register.php' ? "active" : "inactive"; ?>>
                    <a href="/register.php">Register</a>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>
</header>