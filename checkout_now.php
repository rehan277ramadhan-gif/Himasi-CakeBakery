<?php 
include 'header.php';
$kd = mysqli_real_escape_string($conn, $_GET['kode_cs']);
$kode_produk = mysqli_real_escape_string($conn, $_GET['produk']);
$qty = (int) $_GET['qty'];

$cs = mysqli_query($conn, "SELECT * FROM customer WHERE kode_customer = '$kd'");
$rows = mysqli_fetch_assoc($cs);

$prod = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
$produk = mysqli_fetch_assoc($prod);

$subtotal = $produk['harga'] * $qty;
?>

<!-- Pakai style yang sama dengan checkout.php kamu -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');
  :root {
    --rose: #c9848a; --rose-light: #e8b4b8; --rose-dark: #a05a62;
    --gold: #c9a96e; --gold-light: #e8d5b0; --cream: #fdf6f0;
    --white: #ffffff; --text-dark: #3b2a2c; --text-mid: #7a5c60; --text-soft: #b0888c;
  }
  .checkout-section { padding: 60px 0 120px; background: var(--cream); font-family: 'Jost', sans-serif; }
  .checkout-header { margin-bottom: 40px; }
  .checkout-header h2 { font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 600; color: var(--text-dark); letter-spacing: 0.02em; margin-bottom: 6px; }
  .header-line { display:flex; align-items:center; gap:12px; margin-top:8px; margin-bottom:8px; }
  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }
  .checkout-header .sub { font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-soft); font-weight: 300; }
  .checkout-card { background: var(--white); border-radius: 6px; border: 1px solid rgba(201,132,138,0.12); box-shadow: 0 4px 20px rgba(160,90,98,0.08); overflow: hidden; margin-bottom: 24px; }
  .card-head { padding: 16px 28px; background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%); display: flex; align-items: center; gap: 10px; }
  .card-head span { font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.9); font-weight: 500; }
  .card-body-inner { padding: 28px; }
  .order-table { width: 100%; border-collapse: collapse; font-family: 'Jost', sans-serif; }
  .order-table thead tr { border-bottom: 2px solid rgba(201,132,138,0.15); }
  .order-table thead th { padding: 10px 12px; font-size: 0.7rem; letter-spacing: 0.13em; text-transform: uppercase; color: var(--text-soft); font-weight: 500; border: none; }
  .order-table tbody tr { border-bottom: 1px solid rgba(201,132,138,0.08); }
  .order-table tbody td { padding: 12px 12px; font-size: 0.86rem; color: var(--text-mid); border: none; vertical-align: middle; }
  .order-table tbody td:first-child { color: var(--rose-dark); font-weight: 600; }
  .grand-total-row td { padding: 16px 12px !important; background: rgba(201,132,138,0.05); border-top: 2px solid rgba(201,132,138,0.15) !important; font-family: 'Cormorant Garamond', serif !important; font-size: 1.1rem !important; font-weight: 600 !important; color: var(--rose-dark) !important; text-align: right; }
  .notice-banner { border-radius: 4px; padding: 14px 20px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; letter-spacing: 0.04em; }
  .notice-success { background: rgba(201,132,138,0.08); border: 1px solid rgba(201,132,138,0.2); color: var(--rose-dark); }
  .notice-info { background: rgba(201,169,110,0.08); border: 1px solid rgba(201,169,110,0.25); color: #8a6a2e; }
  .field-group { margin-bottom: 18px; }
  .field-group label { display: block; font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-mid); font-weight: 500; margin-bottom: 7px; }
  .field-group input.form-control { width: 100% !important; padding: 12px 16px !important; background: var(--cream) !important; border: 1px solid rgba(201,132,138,0.25) !important; border-radius: 4px !important; font-family: 'Jost', sans-serif !important; font-size: 0.9rem !important; color: var(--text-dark) !important; outline: none !important; box-shadow: none !important; transition: border-color .25s !important; height: auto !important; }
  .field-group input.form-control:focus { border-color: var(--rose) !important; box-shadow: 0 0 0 3px rgba(201,132,138,0.12) !important; background: var(--white) !important; }
  .field-group input[readonly] { background: rgba(201,132,138,0.05) !important; color: var(--text-soft) !important; cursor: not-allowed; }
  .divider-section { width: 100%; height: 1px; background: rgba(201,132,138,0.12); margin: 24px 0; }
  .btn-group-checkout { display: flex; gap: 12px; margin-top: 8px; }
  .btn-order { flex: 1; padding: 14px 20px; background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%); color: var(--white); border: none; border-radius: 4px; font-family: 'Jost', sans-serif; font-size: 0.8rem; font-weight: 500; letter-spacing: 0.15em; text-transform: uppercase; cursor: pointer; transition: opacity .25s, transform .2s; box-shadow: 0 6px 20px rgba(160,90,98,0.28); display: inline-flex; align-items: center; justify-content: center; gap: 8px; }
  .btn-order:hover { opacity: 0.9; transform: translateY(-1px); color: var(--white); text-decoration: none; }
  .btn-cancel { padding: 14px 24px; background: transparent; color: #c0504d; border: 1px solid rgba(192,80,77,0.28); border-radius: 4px; font-family: 'Jost', sans-serif; font-size: 0.8rem; font-weight: 500; letter-spacing: 0.15em; text-transform: uppercase; text-decoration: none; transition: background .25s; display: inline-flex; align-items: center; justify-content: center; }
  .btn-cancel:hover { background: rgba(192,80,77,0.06); border-color: #c0504d; color: #c0504d; text-decoration: none; }
</style>

<div class="checkout-section">
  <div class="container">

    <div class="checkout-header">
      <h2>Checkout Sekarang</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Selesaikan pesanan Anda</p>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="checkout-card">
          <div class="card-head">
            <span class="icon">🧾</span>
            <span>Daftar Pesanan</span>
          </div>
          <div class="card-body-inner">
            <table class="order-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><?= $produk['nama']; ?></td>
                  <td>Rp <?= number_format($produk['harga']); ?></td>
                  <td><?= $qty; ?></td>
                  <td>Rp <?= number_format($subtotal); ?></td>
                </tr>
                <tr class="grand-total-row">
                  <td colspan="5">Grand Total &nbsp;=&nbsp; Rp <?= number_format($subtotal); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="notice-banner notice-success">
      <span class="notice-icon">✅</span>
      Pastikan pesanan Anda sudah benar sebelum melanjutkan.
    </div>
    <div class="notice-banner notice-info">
      <span class="notice-icon">✏️</span>
      Isi form pengiriman di bawah ini dengan lengkap.
    </div>

    <div class="checkout-card">
      <div class="card-head">
        <span class="icon">📦</span>
        <span>Data Pengiriman</span>
      </div>
      <div class="card-body-inner">
        <form action="proses/order_now.php" method="POST">
          <input type="hidden" name="kode_cs" value="<?= $kd; ?>">
          <input type="hidden" name="kode_produk" value="<?= $produk['kode_produk']; ?>">
          <input type="hidden" name="nama_produk" value="<?= $produk['nama']; ?>">
          <input type="hidden" name="harga" value="<?= $produk['harga']; ?>">
          <input type="hidden" name="qty" value="<?= $qty; ?>">

          <div class="field-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $rows['nama']; ?>" readonly>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="field-group">
                <label>Provinsi</label>
                <input type="text" class="form-control" placeholder="Provinsi" name="prov">
              </div>
            </div>
            <div class="col-md-6">
              <div class="field-group">
                <label>Kota</label>
                <input type="text" class="form-control" placeholder="Kota" name="kota">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="field-group">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="almt">
              </div>
            </div>
            <div class="col-md-6">
              <div class="field-group">
                <label>Kode Pos</label>
                <input type="text" class="form-control" placeholder="Kode Pos" name="kopos">
              </div>
            </div>
          </div>
          <div class="divider-section"></div>
          <div class="btn-group-checkout">
            <button type="submit" class="btn-order">
              <i class="glyphicon glyphicon-shopping-cart"></i> Order Sekarang
            </button>
            <a href="detail_produk.php?produk=<?= $kode_produk; ?>" class="btn-cancel">✕ Cancel</a>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php include 'footer.php'; ?>