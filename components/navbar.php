<style>
    <?php include "navbar.css" ?>
</style>
<header>
        <a href="../pages/index.php"><h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span></h1></a>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tips_loker.php">Tips Loker</a></li>
                <?php /*
            <?php if ($role == 'job_seeker') : ?>
                <li><a href="job_seeker_dashboard.php">Job Seeker Dashboard</a></li>
                <?php elseif ($role == 'employee') : ?>
                <li><a href="employee_dashboard.php">Employee Dashboard</a></li>
                <?php elseif ($role == 'moderator') : ?>
                <li><a href="moderator_dashboard.php">Moderator Dashboard</a></li>
                <?php endif; ?>
                <?php if (!$role) : ?>
                <li><a href="login.php" class="bordered">Login</a></li>
                <li><a href="register.php" class="bordered">Register</a></li>
                <?php else : ?>
                <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
                */
                ?>
                <li><a href="job_seeker_dashboard.php">Job Seeker Dashboard</a></li>
            </ul>
        </nav>
    </header>