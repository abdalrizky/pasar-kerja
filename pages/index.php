<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar Kerja - Temukan Pekerjaan Impian Anda</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>

<body>

    <?php include "../components/navbar.php" ?>

    <main>
        <section class="search-jobs">
            <div class="search-jobs-element">
                <h2>Cari Lowongan Pekerjaan</h2>
                <div class="search-jobs-form">
                    <form action="search_results.php" method="GET">
                        <input type="text" name="query" placeholder="Cari berdasarkan posisi atau perusahaan" required>
                        <select name="location">
                            <option value="">Pilih Lokasi</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="samarinda">Samarinda</option>
                        </select>
                        <select name="category">
                            <option value="">Pilih Kategori</option>
                            <option value="it">IT & Software</option>
                            <option value="design">Desain</option>
                            <option value="marketing">Marketing</option>
                        </select>
                        <button type="submit">Cari</button>
                    </form>
                </div>
            </div>
            
        </section>

        <section class="trusted-logos">
            <h2>Telah Dipercaya Oleh</h2>
            <div class="company-logos">
                <div class="company-logo-img">
                    <img src="../assets/img/kominfo-logo.jpg" alt="PT Kominfo">
                </div>
                <div class="company-logo-img">
                <img src="../assets/img/microsoft-logo.jpg" alt="Microsoft">
                </div>
                <div class="company-logo-img">
                <img src="../assets/img/aws-logo.jpg" alt="aws">
                </div>
                <div class="company-logo-img">
                <img src="../assets/img/google-logo.jpg" alt="Google">
                </div>
            </div>
        </section>


        <section class="job-categories">
            <h2>Kategori Pekerjaan</h2>
            <div class="categories">
                <div class="category">
                    <span>IT & Software</span>
                    <img src="../assets/img/it.jpg" alt="IT & Software" class="popup-image">
                </div>
                <div class="category">
                    <span>Desain</span>
                    <img src="../assets/img/design.jpg" alt="Desain" class="popup-image">
                </div>
                <div class="category">
                    <span>Marketing</span>
                    <img src="../assets/img/marketing.jpg" alt="Marketing" class="popup-image">
                </div>
            </div>
        </section>


        <section class="latest-jobs">
            <h2>Lowongan Terbaru</h2>
            <ul class="job-list">
                <li>
                    <img src="../assets/img/logo-adaro.jpg" alt="">
                    <h3>Web Developer</h3>
                    <p>Ditawarkan oleh: ABC Corp</p>
                    <p>Lokasi: Jakarta</p>
                    <a href='job-detail.php?id=1'>Detail</a>
                </li>
                <li>
                    <img src="../assets/img/logo-adaro.jpg" alt="">
                    <h3>Graphic Designer</h3>
                    <p>Perusahaan: XYZ Studio</p>
                    <p>Lokasi: Bandung</p>
                    <a href='job-detail.php?id=2'>Detail</a>
                </li>
                <li>
                <img src="../assets/img/logo-adaro.jpg" alt="">
                    <h3>Marketing Specialist</h3>
                    <p>Perusahaan: LMN Group</p>
                    <p>Lokasi: Surabaya</p>
                    <a href='job-detail.php?id=3'>Detail</a>
                </li>
                <li>
                <img src="../assets/img/logo-adaro.jpg" alt=""> 
                    <h3>Data Analyst</h3>
                    <p>Perusahaan: OPQ Inc.</p>
                    <p>Lokasi: Samarinda</p>
                    <a href='job-detail.php?id=4'>Detail</a>
                </li>
            </ul>
        </section>
    </main>

    <?php include "../components/footer.php" ?>

</body>

</html>