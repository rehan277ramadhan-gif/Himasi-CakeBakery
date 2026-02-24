<?php 
include 'header.php';
$q = $_GET['q'];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$q%'");
$jumlah = mysqli_num_rows($result);
?>

<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <h4 style="font-family: 'Cormorant Garamond', serif; color: var(--rose-dark); border-bottom: 2px solid var(--rose-light); padding-bottom: 10px;">
        Hasil pencarian untuk: <b>"<?= $q ?>"</b> 
        <small style="font-size: 0.9rem; color: var(--text-soft);">(<?= $jumlah ?> produk ditemukan)</small>
    </h4>

    <?php if($jumlah == 0): ?>
        <div style="text-align: center; padding: 60px 0; color: var(--text-soft);">
            <i class="glyphicon glyphicon-search" style="font-size: 3rem; color: var(--rose-light);"></i>
            <p style="margin-top: 15px; font-size: 1.1rem;">Produk tidak ditemukan.</p>
            <a href="produk.php" class="btn" style="background: var(--rose); color: white; border-radius: 20px; margin-top: 10px;">Lihat Semua Produk</a>
        </div>
    <?php else: ?>
        <div class="row" style="margin-top: 20px;">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-3 col-sm-6" style="margin-bottom: 25px;">
                    <div style="background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(160,90,98,0.1); overflow: hidden;">
                        <img src="image/produk/<?= $row['image'] ?>" alt="<?= $row['nama'] ?>" 
                             style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 15px;">
                            <h5 style="font-family: 'Cormorant Garamond', serif; color: var(--rose-dark); font-weight: bold;">
                                <?= $row['nama'] ?>
                            </h5>
                            <p style="color: var(--text-soft); font-size: 0.85rem;">
                                <?= substr($row['deskripsi'], 0, 60) ?>...
                            </p>
                            <p style="color: var(--rose); font-weight: bold;">
                                Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                            </p>
                            <a href="detail.php?kode=<?= $row['kode_produk'] ?>" 
                               class="btn btn-block" 
                               style="background: var(--rose); color: white; border-radius: 20px; font-size: 0.85rem;">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>