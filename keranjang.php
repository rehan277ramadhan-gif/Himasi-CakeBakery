<?php 
include 'header.php';
if(isset($_POST['submit1'])){
  $id_keranjang = $_POST['id'];
  $qty = $_POST['qty'];
  $edit = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty' where id_keranjang = '$id_keranjang'");
  if($edit){
    echo "
    <script>
    alert('KERANJANG BERHASIL DIPERBARUI');
    window.location = 'keranjang.php';
    </script>
    ";
  }
}else if(isset($_GET['del'])){
  $id_keranjang = $_GET['id'];
  $del = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
  if($del){
    echo "
    <script>
    alert('1 PRODUK DIHAPUS');
    window.location = 'keranjang.php';
    </script>
    ";
  }
}
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

  :root {
    --rose:       #c9848a;
    --rose-light: #e8b4b8;
    --rose-dark:  #a05a62;
    --gold:       #c9a96e;
    --gold-light: #e8d5b0;
    --cream:      #fdf6f0;
    --white:      #ffffff;
    --text-dark:  #3b2a2c;
    --text-mid:   #7a5c60;
    --text-soft:  #b0888c;
  }

  * { box-sizing: border-box; }

  .keranjang-section {
    padding: 60px 0 120px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  .keranjang-header { margin-bottom: 40px; }
  .keranjang-header h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem; font-weight: 600;
    color: var(--text-dark); letter-spacing: 0.02em; margin-bottom: 6px;
  }
  .header-line { display:flex; align-items:center; gap:12px; margin-top:8px; margin-bottom:8px; }
  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }
  .keranjang-header .sub {
    font-size: 0.75rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-soft); font-weight: 300;
  }

  /* TABLE WRAPPER */
  .table-wrap {
    background: var(--white); border-radius: 6px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 4px 20px rgba(160,90,98,0.08);
    overflow: hidden; animation: fadeUp .7s ease both;
  }

  /* DESKTOP TABLE */
  .keranjang-table {
    width: 100%; margin: 0; border-collapse: collapse;
    font-family: 'Jost', sans-serif;
  }
  .keranjang-table thead tr {
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
  }
  .keranjang-table thead th {
    padding: 16px 18px; font-size: 0.72rem;
    letter-spacing: 0.15em; text-transform: uppercase;
    color: rgba(255,255,255,0.92); font-weight: 500; border: none;
  }
  .keranjang-table tbody tr {
    border-bottom: 1px solid rgba(201,132,138,0.1); transition: background .2s;
  }
  .keranjang-table tbody tr:hover { background: rgba(201,132,138,0.04); }
  .keranjang-table tbody td {
    padding: 16px 18px; vertical-align: middle;
    font-size: 0.88rem; color: var(--text-mid); border: none;
  }
  .keranjang-table tbody td:first-child { font-weight: 600; color: var(--rose-dark); }
  .keranjang-table tbody img {
    width: 80px; height: 70px; object-fit: cover;
    border-radius: 4px; border: 1px solid rgba(201,132,138,0.15);
  }

  /* QTY */
  .qty-input {
    width: 80px !important; text-align: center !important;
    padding: 8px 10px !important;
    border: 1px solid rgba(201,132,138,0.3) !important;
    border-radius: 4px !important; font-family: 'Jost', sans-serif !important;
    font-size: 0.88rem !important; color: var(--text-dark) !important;
    background: var(--cream) !important; box-shadow: none !important; outline: none !important;
  }
  .qty-input:focus {
    border-color: var(--rose) !important;
    box-shadow: 0 0 0 3px rgba(201,132,138,0.12) !important;
  }

  /* BUTTONS */
  .btn-update {
    padding: 8px 16px; background: transparent; color: var(--rose-dark);
    border: 1px solid var(--rose-light); border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.72rem;
    font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase;
    cursor: pointer; transition: background .25s;
  }
  .btn-update:hover { background: rgba(201,132,138,0.08); border-color: var(--rose); }

  .btn-delete {
    padding: 8px 16px; background: transparent; color: #c0504d;
    border: 1px solid rgba(192,80,77,0.3); border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.72rem;
    font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase;
    text-decoration: none; cursor: pointer; transition: background .25s; display: inline-block;
  }
  .btn-delete:hover { background: rgba(192,80,77,0.07); border-color: #c0504d; color: #c0504d; text-decoration: none; }

  /* GRAND TOTAL */
  .grand-total-row td {
    padding: 18px 18px !important;
    background: rgba(201,132,138,0.06);
    border-top: 2px solid rgba(201,132,138,0.2) !important;
    font-family: 'Cormorant Garamond', serif !important;
    font-size: 1.15rem !important; font-weight: 600 !important;
    color: var(--rose-dark) !important; text-align: right;
  }
  .action-row td {
    padding: 16px 18px !important; text-align: right;
    border: none !important; background: var(--white);
  }
  .btn-lanjut {
    padding: 11px 24px; background: transparent; color: var(--text-mid);
    border: 1px solid rgba(122,92,96,0.25); border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.78rem;
    font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
    text-decoration: none; transition: background .25s; display: inline-block; margin-right: 8px;
  }
  .btn-lanjut:hover { background: rgba(122,92,96,0.06); border-color: var(--text-mid); color: var(--text-dark); text-decoration: none; }
  .btn-checkout {
    padding: 11px 24px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    color: var(--white); border: none; border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.78rem;
    font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
    text-decoration: none; transition: opacity .25s, transform .2s;
    box-shadow: 0 6px 20px rgba(160,90,98,0.28); display: inline-block;
  }
  .btn-checkout:hover { opacity: 0.9; transform: translateY(-1px); color: var(--white); text-decoration: none; }

  /* EMPTY / NOT LOGIN */
  .info-row td { padding: 50px 20px !important; text-align: center; border: none !important; }
  .empty-box, .login-box-info {
    display: inline-flex; flex-direction: column; align-items: center; gap: 12px;
  }
  .empty-box .icon, .login-box-info .icon { font-size: 2.5rem; }
  .empty-box p {
    font-family: 'Cormorant Garamond', serif; font-size: 1.1rem;
    font-style: italic; color: var(--text-soft); margin: 0;
  }
  .login-box-info p { font-size: 0.88rem; color: var(--text-soft); margin: 0; letter-spacing: 0.05em; }

  @keyframes fadeUp {
    from { opacity:0; transform:translateY(20px); }
    to   { opacity:1; transform:translateY(0); }
  }

  /* ===== MOBILE CARD STYLE ===== */
  @media (max-width: 768px) {
    .keranjang-section { padding: 30px 0 80px; }
    .keranjang-header h2 { font-size: 1.6rem; }

    /* Sembunyikan tabel desktop, tampilkan card mobile */
    .keranjang-table { display: none; }
    .mobile-keranjang { display: block; }

    .action-bottom {
      padding: 16px;
      display: flex; flex-direction: column; gap: 10px;
    }
    .btn-lanjut, .btn-checkout {
      display: block; text-align: center;
      width: 100%; margin: 0;
    }
    .grand-total-mobile {
      background: rgba(201,132,138,0.06);
      border-top: 2px solid rgba(201,132,138,0.15);
      padding: 16px;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.1rem; font-weight: 600;
      color: var(--rose-dark); text-align: right;
    }
  }

  @media (min-width: 769px) {
    .mobile-keranjang { display: none; }
    .action-bottom { display: none; }
    .grand-total-mobile { display: none; }
  }

  /* CARD ITEM MOBILE */
  .cart-card {
    border-bottom: 1px solid rgba(201,132,138,0.12);
    padding: 16px;
    display: flex; gap: 12px; align-items: flex-start;
  }
  .cart-card img {
    width: 75px; height: 65px; object-fit: cover;
    border-radius: 4px; flex-shrink: 0;
    border: 1px solid rgba(201,132,138,0.15);
  }
  .cart-card-info { flex: 1; }
  .cart-card-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1rem; font-weight: 600;
    color: var(--text-dark); margin-bottom: 4px;
  }
  .cart-card-price { font-size: 0.85rem; color: var(--rose-dark); font-weight: 500; margin-bottom: 8px; }
  .cart-card-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
  .cart-card-actions .qty-input { width: 65px !important; padding: 6px 8px !important; font-size: 0.82rem !important; }
  .cart-card-subtotal { font-size: 0.8rem; color: var(--text-soft); margin-top: 6px; }
</style>

<div class="keranjang-section">
  <div class="container">

    <div class="keranjang-header">
      <h2>Keranjang Belanja</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Produk pilihan Anda</p>
    </div>

    <?php 
    if(isset($_SESSION['user'])){
      $kode_cs = $_SESSION['kd_cs'];
      $cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kode_cs'");
      $jml = mysqli_num_rows($cek);
      if($jml > 0){
        $result = mysqli_query($conn, "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
        $rows = [];
        $hasil = 0;
        while($row = mysqli_fetch_assoc($result)){
          $rows[] = $row;
          $hasil += $row['hrg'] * $row['jml'];
        }
    ?>

    <!-- TABEL DESKTOP -->
    <div class="table-wrap">
      <table class="keranjang-table">
        <thead>
          <tr>
            <th>No</th><th>Image</th><th>Nama</th>
            <th>Harga</th><th>Qty</th><th>SubTotal</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($rows as $row): ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $row['keranjang']; ?>">
            <tr>
              <td><?= $no; ?></td>
              <td><img src="image/produk/<?= $row['gambar']; ?>"></td>
              <td><?= $row['nama']; ?></td>
              <td>Rp <?= number_format($row['hrg']); ?></td>
              <td><input type="number" name="qty" class="qty-input" value="<?= $row['jml']; ?>"></td>
              <td>Rp <?= number_format($row['hrg'] * $row['jml']); ?></td>
              <td>
                <button type="submit" name="submit1" class="btn-update">Update</button>
                &nbsp;
                <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>
              </td>
            </tr>
          </form>
          <?php $no++; endforeach; ?>
          <tr class="grand-total-row">
            <td colspan="7">Grand Total &nbsp;=&nbsp; Rp <?= number_format($hasil); ?></td>
          </tr>
          <tr class="action-row">
            <td colspan="7">
              <a href="index.php" class="btn-lanjut">← Lanjutkan Belanja</a>
              <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn-checkout">Checkout →</a>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- CARD MOBILE -->
      <div class="mobile-keranjang">
        <?php foreach($rows as $row): ?>
        <div class="cart-card">
          <img src="image/produk/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>">
          <div class="cart-card-info">
            <div class="cart-card-name"><?= $row['nama']; ?></div>
            <div class="cart-card-price">Rp <?= number_format($row['hrg']); ?></div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="hidden" name="id" value="<?= $row['keranjang']; ?>">
              <div class="cart-card-actions">
                <input type="number" name="qty" class="qty-input" value="<?= $row['jml']; ?>" min="1">
                <button type="submit" name="submit1" class="btn-update">Update</button>
                <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>
              </div>
            </form>
            <div class="cart-card-subtotal">Subtotal: Rp <?= number_format($row['hrg'] * $row['jml']); ?></div>
          </div>
        </div>
        <?php endforeach; ?>

        <div class="grand-total-mobile">
          Grand Total &nbsp;=&nbsp; Rp <?= number_format($hasil); ?>
        </div>
        <div class="action-bottom">
          <a href="index.php" class="btn-lanjut">← Lanjutkan Belanja</a>
          <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn-checkout">Checkout →</a>
        </div>
      </div>

    </div>

    <?php }else{ ?>
    <div class="table-wrap">
      <table class="keranjang-table">
        <thead>
          <tr><th>No</th><th>Image</th><th>Nama</th><th>Harga</th><th>Qty</th><th>SubTotal</th><th>Action</th></tr>
        </thead>
        <tbody>
          <tr class="info-row">
            <td colspan="7">
              <div class="empty-box">
                <span class="icon">🛒</span>
                <p>Keranjang belanja Anda masih kosong.</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php } }else{ ?>
    <div class="table-wrap">
      <table class="keranjang-table">
        <tbody>
          <tr class="info-row">
            <td colspan="7">
              <div class="login-box-info">
                <span class="icon">🔒</span>
                <p>Silahkan login terlebih dahulu sebelum berbelanja.</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php } ?>

  </div>
</div>

<?php include 'footer.php'; ?>