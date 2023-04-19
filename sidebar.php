<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.php" alt="logo"><img src="../assets/images/icon.png" class="img-logo" alt=""></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <?php
                if ($_SESSION['level'] == "Admin") {
                ?>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        </li>
                        <hr>
                        <li class="active">
                            <a href="data_indikator.php" aria-expanded="true"><i class="fa fa-sticky-note-o"></i><span>Indikator</span></a>
                        </li>
                        <li class="active">
                            <a href="data_pertanyaan.php" aria-expanded="true"><i class="fa fa-question-circle"></i><span>Pertanyaan</span></a>
                        </li>
                        <li class="active">
                            <a href="data_responden.php" aria-expanded="true"><i class="fa fa-users"></i><span>Responden</span></a>
                        </li>
                        <li class="active">
                            <a href="proses_index.php" aria-expanded="true"><i class="fa fa-spinner"></i><span>Proses Index</span></a>
                        </li>
                        <li class="active">
                            <a href="gap.php" aria-expanded="true"><i class="fa fa-file-o"></i><span>Hasil GAP</span></a>
                        </li>
                        <li class="active">
                            <a href="maturity.php" aria-expanded="true"><i class="fa fa-file-o"></i><span>Hasil Maturity Level</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-pdf-o text-light"></i><span class="text-light">Laporan</span></a>
                            <ul class="collapse">
                                <li><a target="_blank" href="laporan_indikator.php">Data Indikator</a></li>
                                <li><a target="_blank" href="laporan_pertanyaan.php">Data Pertanyaan</a></li>
                                <li><a target="_blank" href="laporan_responden.php">Data Responden</a></li>
                                <li><a target="_blank" href="laporan_kuisioner.php">Data Kuisioner</a></li>
                                <li><a target="_blank" href="laporan_gap.php">Data GAP</a></li>
                                <li><a target="_blank" href="laporan_maturity.php">Data Maturty</a></li>

                            </ul>
                        </li>
                    </ul>
                <?php
                } elseif ($_SESSION['level'] == "Pimpinan") {
                ?>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-pdf-o text-light"></i><span class="text-light">Laporan</span></a>
                            <ul class="collapse">
                                <li><a target="_blank" href="laporan_indikator.php">Data Indikator</a></li>
                                <li><a target="_blank" href="laporan_pertanyaan.php">Data Pertanyaan</a></li>
                                <li><a target="_blank" href="laporan_responden.php">Data Responden</a></li>
                                <li><a target="_blank" href="laporan_kuisioner.php">Data Kuisioner</a></li>
                                <li><a target="_blank" href="laporan_gap.php">Data GAP</a></li>
                                <li><a target="_blank" href="laporan_maturity.php">Data Maturity</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else {
                    echo "<script>
                    alert('Anda tidak memiliki akses!');
                    document.location.href='login.php';
                </script>";
                }
                ?>
            </nav>
        </div>
    </div>
</div>