<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">D4G-DEV News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (!$isLogin) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/register">Register</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class=" nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="m-2"><?= $fullname; ?></p>
                            <div class="container-fluid">
                                <img src="<?= base_url('uploads/profiles/' . $profile); ?>" class="rounded-circle" height="40" alt="Avatar" loading="lazy" />
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/user/dashboard">Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/user/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>