<div class="row-fluid">
<!-- Sidebar statrt -->
    <div class="span2 sidebar-container">
        <div class="sidebar">
            <div class="nav-collapse collapse leftmenu">
                <ul>
                    <?php
                        if( is_editor() && is_dashboard() || is_admin() ):
                    ?>
                        <li>
                            <a class="dashboard" href="<?=ADMIN_URL.'index.php'?>">
                                <span><em>Quản Trị</em></span>
                            </a>
                        </li>
                        <li>
                            <a class="list">
                                <span><em>Bài Viết</em></span>
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a class="list" href="<?=ADMIN_URL.'index.php'?>">
                                        <span><em>Quản Lý</em></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="list" href="<?=ADMIN_URL.'add_post.php'?>">
                                        <span><em>Thêm Mới</em></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="list">
                                <span><em>Cây Thuốc</em></span>
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/add_caythuoc.php'?>">
                                        <span><em>Thêm Mới</em></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/caythuoc.php' ?>">
                                        <span><em>Quản Lý</em></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="list">
                                <span><em>Quản Lý Bệnh</em></span>
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/benh.php'?>">
                                        <span><em>Quản Lý</em></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/add_benh.php' ?>">
                                        <span><em>Thêm Mới</em></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="list">
                                <span><em>Tác Dụng</em></span>
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/tacdung.php'?>">
                                        <span><em>Quản Lý</em></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="list" href="<?=SITE_URL.'admincp/add_tacdung.php' ?>">
                                        <span><em>Thêm Mới</em></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if(admin_access()) :?>
                        <li>
                            <a class="list" href="<?=SITE_URL.'admincp/users.php' ?>">
                                <span><em>Quản lý thành viên</em></span>
                            </a>
                        </li>
                        <li>
                            <a class="list" href="<?=SITE_URL.'admincp/comments.php' ?>">
                                <span><em>Quản lý bình luận</em></span>
                            </a>
                        </li>
                        <?php endif;?>
                         <li>
                            <a class="list" href="<?=SITE_URL.'admincp/log.php' ?>">
                                <span><em>Quản lý Log</em></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<!-- Sidebar end -->