<?php 
include 'header.php';
$kode = mysqli_real_escape_string($conn,$_GET['produk']);
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$row = mysqli_fetch_assoc($result);
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

  .detail-section {
    padding: 60px 0 100px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  .detail-header { margin-bottom: 40px; }
  .detail-header h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem; font-weight: 600;
    color: var(--text-dark); letter-spacing: 0.02em; margin-bottom: 6px;
  }
  .header-line { display:flex; align-items:center; gap:12px; margin-top:8px; margin-bottom:8px; }
  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }
  .detail-header .sub {
    font-size: 0.75rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-soft); font-weight: 300;
  }

  .img-panel {
    background: var(--white); border-radius: 6px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 4px 20px rgba(160,90,98,0.08);
    overflow: hidden; animation: fadeLeft .7s ease both;
    margin-bottom: 20px;
  }
  .img-panel img {
    width: 100%; height: 340px;
    object-fit: cover; display: block; transition: transform .4s;
  }
  .img-panel:hover img { transform: scale(1.03); }
  .img-panel .img-footer {
    padding: 14px 18px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    text-align: center; font-size: 0.72rem;
    letter-spacing: 0.15em; text-transform: uppercase;
    color: rgba(255,255,255,0.85); font-weight: 300;
  }

  .info-panel {
    background: var(--white); border-radius: 6px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 4px 20px rgba(160,90,98,0.08);
    padding: 36px 38px 32px; animation: fadeRight .7s ease both;
  }

  .detail-table { width: 100%; margin-bottom: 24px; border-collapse: collapse; }
  .detail-table tr { border-bottom: 1px solid rgba(201,132,138,0.1); }
  .detail-table tr:last-child { border-bottom: none; }
  .detail-table td {
    padding: 14px 4px; font-size: 0.88rem;
    color: var(--text-mid); vertical-align: top;
  }
  .detail-table td:first-child {
    font-size: 0.72rem; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--text-soft);
    font-weight: 500; width: 110px; padding-top: 16px;
  }
  .detail-table .val-nama {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.4rem; font-weight: 600;
    color: var(--text-dark); letter-spacing: 0.02em;
  }
  .detail-table .val-harga {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.3rem; font-weight: 600; color: var(--rose-dark);
  }
  .detail-table .val-desc {
    font-size: 0.88rem; color: var(--text-mid); line-height: 1.7;
  }

  .qty-input {
    width: 120px !important; padding: 10px 14px !important;
    border: 1px solid rgba(201,132,138,0.3) !important;
    border-radius: 4px !important; font-family: 'Jost', sans-serif !important;
    font-size: 0.9rem !important; color: var(--text-dark) !important;
    background: var(--cream) !important; box-shadow: none !important;
    outline: none !important; text-align: center !important;
    transition: border-color .25s !important;
  }
  .qty-input:focus {
    border-color: var(--rose) !important;
    box-shadow: 0 0 0 3px rgba(201,132,138,0.12) !important;
  }

  .divider-gold {
    width: 100%; height: 1px;
    background: rgba(201,132,138,0.12); margin: 20px 0;
  }

  .btn-group-detail { display: flex; gap: 12px; flex-wrap: wrap; }

  .btn-keranjang {
    flex: 1; padding: 13px 20px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    color: var(--white); border: none; border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.8rem;
    font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
    cursor: pointer; transition: opacity .25s, transform .2s;
    box-shadow: 0 6px 20px rgba(160,90,98,0.28);
    text-decoration: none; text-align: center;
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  }
  .btn-keranjang:hover {
    opacity: 0.9; transform: translateY(-1px);
    color: var(--white); text-decoration: none;
  }

  .btn-checkout {
    flex: 1; padding: 13px 20px;
    background: linear-gradient(135deg, var(--gold) 0%, #a07a3a 100%);
    color: var(--white); border: none; border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.8rem;
    font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
    cursor: pointer; transition: opacity .25s, transform .2s;
    box-shadow: 0 6px 20px rgba(160,120,50,0.28);
    text-decoration: none; text-align: center;
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  }
  .btn-checkout:hover {
    opacity: 0.9; transform: translateY(-1px);
    color: var(--white); text-decoration: none;
  }

  .btn-kembali {
    padding: 13px 20px; background: transparent;
    color: var(--text-mid); border: 1px solid rgba(122,92,96,0.25);
    border-radius: 4px; font-family: 'Jost', sans-serif;
    font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em;
    text-transform: uppercase; text-decoration: none;
    transition: background .25s; display: inline-flex;
    align-items: center; justify-content: center;
  }
  .btn-kembali:hover {
    background: rgba(122,92,96,0.06);
    border-color: var(--text-mid); color: var(--text-dark); text-decoration: none;
  }

  @keyframes fadeLeft {
    from { opacity:0; transform:translateX(-20px); }
    to   { opacity:1; transform:translateX(0); }
  }
  @keyframes fadeRight {
    from { opacity:0; transform:translateX(20px); }
    to   { opacity:1; transform:translateX(0); }
  }

  @media (max-width: 768px) {
    .detail-section { padding: 30px 0 60px; }
    .detail-header h2 { font-size: 1.6rem; }
    .img-panel img { height: 240px; }
    .info-panel { padding: 20px 18px 20px; }
    .detail-table td { padding: 10px 4px; font-size: 0.85rem; }
    .detail-table td:first-child { width: 80px; font-size: 0.68rem; }
    .detail-table .val-nama { font-size: 1.15rem; }
    .detail-table .val-harga { font-size: 1.1rem; }
    .btn-group-detail { flex-direction: column; gap: 10px; }
    .btn-keranjang, .btn-checkout { flex: none; width: 100%; }
    .btn-kembali { width: 100%; justify-content: center; }
    .qty-input { width: 100% !important; }
  }
</style>

<div class="detail-section">
  <div class="container">

    <div class="detail-header">
      <h2>Detail Produk</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Informasi lengkap produk pilihan Anda</p>
    </div>

    <div class="row">

      <!-- IMAGE -->
      <div class="col-md-4 col-sm-12">
        <div class="img-panel">
          <img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>">
          <div class="img-footer">HIMASI-CAKE BAKERY</div>
        </div>
      </div>

      <!-- INFO -->
      <div class="col-md-8 col-sm-12">
        <div class="info-panel">
          <form action="proses/add.php" method="GET">
            <input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
            <input type="hidden" name="produk" value="<?= $kode; ?>">
            <input type="hidden" name="hal" value="2">
            <input type="hidden" name="action" value="keranjang" id="actionInput">

            <table class="detail-table">
              <tbody>
                <tr>
                  <td>Nama</td>
                  <td><span class="val-nama"><?= $row['nama']; ?></span></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td><span class="val-harga">Rp <?= number_format($row['harga']); ?></span></td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td><span class="val-desc"><?= $row['deskripsi']; ?></span></td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td><input class="qty-input form-control" type="number" min="1" name="jml" value="1"></td>
                </tr>
              </tbody>
            </table>

            <div class="divider-gold"></div>

            <div class="btn-group-detail">
              <?php if(isset($_SESSION['user'])){ ?>

                <button type="submit" class="btn-keranjang"
                  onclick="document.getElementById('actionInput').value='keranjang'">
                  <i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang
                </button>

                <button type="submit" class="btn-checkout"
                  onclick="document.getElementById('actionInput').value='checkout'">
                  <i class="glyphicon glyphicon-tag"></i> Checkout Sekarang
                </button>

              <?php }else{ ?>
                <a href="login.php" class="btn-keranjang">
                  <i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang
                </a>
                <a href="login.php" class="btn-checkout">
                  <i class="glyphicon glyphicon-tag"></i> Checkout Sekarang
                </a>
              <?php } ?>
              <a href="index.php" class="btn-kembali">← Kembali Belanja</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include 'footer.php'; ?>