<?php 
include 'header.php';

// pesanan baru 
$result1 = mysqli_query($conn, "SELECT p.invoice, c.nama, p.tanggal, SUM(p.harga * p.qty) as total 
    FROM produksi p 
    LEFT JOIN customer c ON p.kode_customer = c.kode_customer
    WHERE p.terima = 0 AND p.tolak = 0 
    GROUP BY p.invoice, c.nama, p.tanggal");
$jml1 = mysqli_num_rows($result1);

// pesanan dibatalkan
$result2 = mysqli_query($conn, "SELECT p.invoice, c.nama, p.tanggal, SUM(p.harga * p.qty) as total 
    FROM produksi p 
    LEFT JOIN customer c ON p.kode_customer = c.kode_customer
    WHERE p.tolak = 1 
    GROUP BY p.invoice, c.nama, p.tanggal");
$jml2 = mysqli_num_rows($result2);

// pesanan diterima
$result3 = mysqli_query($conn, "SELECT p.invoice, c.nama, p.tanggal, SUM(p.harga * p.qty) as total 
    FROM produksi p 
    LEFT JOIN customer c ON p.kode_customer = c.kode_customer
    WHERE p.terima = 1 
    GROUP BY p.invoice, c.nama, p.tanggal");
$jml3 = mysqli_num_rows($result3);
?>

<style>
.dashboard-wrap { padding: 30px 0 80px; }
.dashboard-title { font-size: 1.4rem; font-weight: bold; color: #444; margin-bottom: 25px; border-bottom: 2px solid #ddd; padding-bottom: 10px; }

/* KARTU */
.card-box { background: #f0f0f0; border-radius: 10px; padding: 20px 25px; cursor: pointer; transition: all 0.2s ease; border: 2px solid transparent; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
.card-box:hover { background: #e4e4e4; border-color: #bbb; box-shadow: 0 4px 16px rgba(0,0,0,0.13); transform: translateY(-2px); }
.card-box .card-label { font-size: 0.85rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #666; margin-bottom: 8px; }
.card-box .card-number { font-size: 52pt; font-weight: bold; line-height: 1; color: #333; }
.card-box .card-sub { font-size: 0.8rem; color: #888; margin-top: 8px; }
.card-box .card-icon { font-size: 1.8rem; float: right; margin-top: -5px; }

/* Warna badge per status */
.card-baru .card-icon { color: #5b8dd9; }
.card-batal .card-icon { color: #d9534f; }
.card-terima .card-icon { color: #5cb85c; }
.card-baru { border-left: 5px solid #5b8dd9; }
.card-batal { border-left: 5px solid #d9534f; }
.card-terima { border-left: 5px solid #5cb85c; }

/* MODAL */
.modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.45); z-index: 9999; justify-content: center; align-items: center; }
.modal-overlay.active { display: flex; }
.modal-box { background: #fff; border-radius: 12px; width: 90%; max-width: 650px; max-height: 80vh; overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 8px 40px rgba(0,0,0,0.2); }
.modal-header { padding: 18px 24px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
.modal-header h5 { margin: 0; font-size: 1rem; font-weight: 700; color: #333; }
.modal-close { background: none; border: none; font-size: 1.4rem; cursor: pointer; color: #888; line-height: 1; }
.modal-close:hover { color: #333; }
.modal-body { padding: 20px 24px; overflow-y: auto; }
.modal-body table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
.modal-body table th { background: #f5f5f5; color: #555; font-weight: 600; padding: 10px 12px; text-align: left; border-bottom: 2px solid #eee; }
.modal-body table td { padding: 10px 12px; border-bottom: 1px solid #f0f0f0; color: #444; vertical-align: middle; }
.modal-body table tr:last-child td { border-bottom: none; }
.modal-body table tr:hover td { background: #fafafa; }
.empty-modal { text-align: center; color: #aaa; padding: 30px 0; font-size: 0.9rem; }
</style>

<div class="container dashboard-wrap">
    <div class="dashboard-title">📊 Dashboard Admin</div>
    <div class="row">

        <!-- PESANAN BARU -->
        <div class="col-md-4">
            <div class="card-box card-baru" onclick="bukaModal('modal-baru')">
                <span class="card-icon">🕐</span>
                <div class="card-label">Pesanan Baru</div>
                <div class="card-number"><?= $jml1 ?></div>
                <div class="card-sub">Klik untuk lihat detail</div>
            </div>
        </div>

        <!-- PESANAN DIBATALKAN -->
        <div class="col-md-4">
            <div class="card-box card-batal" onclick="bukaModal('modal-batal')">
                <span class="card-icon">❌</span>
                <div class="card-label">Pesanan Dibatalkan</div>
                <div class="card-number"><?= $jml2 ?></div>
                <div class="card-sub">Klik untuk lihat detail</div>
            </div>
        </div>

        <!-- PESANAN DITERIMA -->
        <div class="col-md-4">
            <div class="card-box card-terima" onclick="bukaModal('modal-terima')">
                <span class="card-icon">✅</span>
                <div class="card-label">Pesanan Diterima</div>
                <div class="card-number"><?= $jml3 ?></div>
                <div class="card-sub">Klik untuk lihat detail</div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PESANAN BARU -->
<div class="modal-overlay" id="modal-baru">
    <div class="modal-box">
        <div class="modal-header">
            <h5>🕐 Detail Pesanan Baru</h5>
            <button class="modal-close" onclick="tutupModal('modal-baru')">✕</button>
        </div>
        <div class="modal-body">
            <?php if($jml1 == 0): ?>
                <div class="empty-modal">Tidak ada pesanan baru.</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Invoice</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        mysqli_data_seek($result1, 0);
                        while($row = mysqli_fetch_assoc($result1)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['invoice']) ?></td>
                            <td><?= htmlspecialchars($row['nama'] ?? '-') ?></td>
                            <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- MODAL PESANAN DIBATALKAN -->
<div class="modal-overlay" id="modal-batal">
    <div class="modal-box">
        <div class="modal-header">
            <h5>❌ Detail Pesanan Dibatalkan</h5>
            <button class="modal-close" onclick="tutupModal('modal-batal')">✕</button>
        </div>
        <div class="modal-body">
            <?php if($jml2 == 0): ?>
                <div class="empty-modal">Tidak ada pesanan dibatalkan.</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Invoice</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        mysqli_data_seek($result2, 0);
                        while($row = mysqli_fetch_assoc($result2)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['invoice']) ?></td>
                            <td><?= htmlspecialchars($row['nama'] ?? '-') ?></td>
                            <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- MODAL PESANAN DITERIMA -->
<div class="modal-overlay" id="modal-terima">
    <div class="modal-box">
        <div class="modal-header">
            <h5>✅ Detail Pesanan Diterima</h5>
            <button class="modal-close" onclick="tutupModal('modal-terima')">✕</button>
        </div>
        <div class="modal-body">
            <?php if($jml3 == 0): ?>
                <div class="empty-modal">Tidak ada pesanan diterima.</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Invoice</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        mysqli_data_seek($result3, 0);
                        while($row = mysqli_fetch_assoc($result3)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['invoice']) ?></td>
                            <td><?= htmlspecialchars($row['nama'] ?? '-') ?></td>
                            <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function bukaModal(id) {
    document.getElementById(id).classList.add('active');
}
function tutupModal(id) {
    document.getElementById(id).classList.remove('active');
}
// Klik di luar modal = tutup
document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
    overlay.addEventListener('click', function(e) {
        if(e.target === overlay) {
            overlay.classList.remove('active');
        }
    });
});
</script>

<?php include 'footer.php'; ?>