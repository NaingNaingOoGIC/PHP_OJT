<?php include_once '../controller/header.php' ?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light gradient-violet" >
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"> <img src="../images/navlogo.jpg" class="rounded" style="width: 50px;height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $add; ?>" href="addStudent.php">
                        生徒追加
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $remove; ?>" href="removeStudent.php">生徒削除</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $update; ?>" href="updateStudentInfo.php">生徒更新</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $view; ?>" href="view.php">生徒一覧</a>
                </li>
            </ul>
            <a class="nav-link text-light" href="../controller/logout.php">ログアウト<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
</nav>