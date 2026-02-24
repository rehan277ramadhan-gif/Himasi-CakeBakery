<?php 
session_start();
include '../koneksi/koneksi.php';
include 'header.php';

// Kirim balasan
if(isset($_POST['pesan']) && $_POST['pesan'] != '' && isset($_POST['kode_cs'])){
    $pesan = $_POST['pesan'];
    $kode_cs = $_POST['kode_cs'];
    mysqli_query($conn, "INSERT INTO pesan (kode_customer, pesan, pengirim) VALUES ('$kode_cs', '$pesan', 'admin')");
    
    // Tambahkan baris ini ↓
    header("Location: chat_admin.php?cs=$kode_cs");
    exit();
}

// Pilih customer yang dipilih
$selected_cs = isset($_GET['cs']) ? $_GET['cs'] : '';

// Ambil semua customer yang pernah chat
$customers = mysqli_query($conn, "SELECT DISTINCT kode_customer FROM pesan ORDER BY kode_customer");

// Tandai pesan customer sudah dibaca
if($selected_cs != ''){
    mysqli_query($conn, "UPDATE pesan SET is_read = 1 WHERE kode_customer = '$selected_cs' AND pengirim = 'customer'");
    $pesan_result = mysqli_query($conn, "SELECT * FROM pesan WHERE kode_customer = '$selected_cs' ORDER BY waktu ASC");
}

// Hitung notif belum dibaca
$notif_cs = mysqli_query($conn, "SELECT kode_customer, COUNT(*) as jumlah FROM pesan WHERE pengirim = 'customer' AND is_read = 0 GROUP BY kode_customer");
$notif_arr = [];
while($n = mysqli_fetch_assoc($notif_cs)){
    $notif_arr[$n['kode_customer']] = $n['jumlah'];
}
?>

<style>
.chat-admin-wrap { display: flex; gap: 20px; margin: 30px 0 80px; }
.chat-sidebar { width: 250px; background: #fff; border-radius: 10px; border: 1px solid rgba(201,132,138,0.2); padding: 15px; box-shadow: 0 4px 20px rgba(160,90,98,0.08); }
.chat-sidebar h5 { font-family: 'Cormorant Garamond', serif; color: var(--rose-dark); font-size: 1.1rem; border-bottom: 1px solid var(--rose-light); padding-bottom: 8px; margin-bottom: 12px; }
.cs-item { display: block; padding: 10px 12px; border-radius: 6px; color: var(--text-mid); text-decoration: none; font-size: 0.88rem; margin-bottom: 5px; transition: background .2s; position: relative; }
.cs-item:hover, .cs-item.active { background: rgba(201,132,138,0.1); color: var(--rose-dark); text-decoration: none; }
.cs-badge { background: var(--rose-dark); color: white; border-radius: 50%; padding: 1px 6px; font-size: 0.7rem; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); }
.chat-main { flex: 1; }
.chat-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: var(--rose-dark); border-bottom: 2px solid var(--rose-light); padding-bottom: 10px; margin-bottom: 20px; }
.chat-box { background: #fff; border-radius: 10px; border: 1px solid rgba(201,132,138,0.2); padding: 20px; height: 420px; overflow-y: auto; display: flex; flex-direction: column; gap: 12px; box-shadow: 0 4px 20px rgba(160,90,98,0.08); margin-bottom: 15px; }
.bubble { max-width: 70%; padding: 10px 15px; border-radius: 18px; font-size: 0.9rem; line-height: 1.5; word-break: break-word; }
.bubble-customer { background: var(--cream); color: var(--text-dark); border: 1px solid var(--rose-light); align-self: flex-start; border-bottom-left-radius: 4px; }
.bubble-admin { background: linear-gradient(135deg, var(--rose), var(--rose-dark)); color: white; align-self: flex-end; border-bottom-right-radius: 4px; }
.bubble-time { font-size: 0.7rem; opacity: 0.7; margin-top: 4px; }
.bubble-name { font-size: 0.72rem; font-weight: bold; margin-bottom: 3px; color: var(--rose-dark); }
.chat-form { display: flex; gap: 10px; }
.chat-form input { flex: 1; border: 1.5px solid var(--rose-light); border-radius: 25px; padding: 10px 20px; font-size: 0.9rem; outline: none; background: var(--cream); }
.chat-form input:focus { border-color: var(--rose); }
.chat-form button { background: linear-gradient(135deg, var(--rose), var(--rose-dark)); color: white; border: none; border-radius: 25px; padding: 10px 25px; cursor: pointer; font-size: 0.9rem; }
.empty-chat { text-align: center; color: var(--text-soft); margin: auto; }
</style>

<div class="container">
    <h3 class="chat-title">💬 Chat dengan Customer</h3>
    <div class="chat-admin-wrap">

        <!-- SIDEBAR DAFTAR CUSTOMER -->
        <div class="chat-sidebar">
            <h5>Daftar Customer</h5>
            <?php 
            mysqli_data_seek($customers, 0);
            while($cs = mysqli_fetch_assoc($customers)):
                $kd = $cs['kode_customer'];
                $aktif = ($kd == $selected_cs) ? 'active' : '';
                $badge = isset($notif_arr[$kd]) ? "<span class='cs-badge'>{$notif_arr[$kd]}</span>" : '';
                echo "<a href='chat_admin.php?cs=$kd' class='cs-item $aktif'>
                        <i class='glyphicon glyphicon-user'></i> $kd $badge
                      </a>";
            endwhile; ?>
        </div>

        <!-- AREA CHAT -->
        <div class="chat-main">
            <?php if($selected_cs == ''): ?>
                <div style="text-align:center; padding: 80px 0; color: var(--text-soft);">
                    <i class="glyphicon glyphicon-comment" style="font-size: 3rem; color: var(--rose-light);"></i>
                    <p style="margin-top: 15px;">Pilih customer di sebelah kiri untuk memulai chat</p>
                </div>
            <?php else: ?>
                <div class="chat-box" id="chatBox">
                    <?php 
                    $jumlah = mysqli_num_rows($pesan_result);
                    if($jumlah == 0): ?>
                        <div class="empty-chat"><p>Belum ada pesan dari customer ini.</p></div>
                    <?php else:
                        while($row = mysqli_fetch_assoc($pesan_result)):
                            $kelas = $row['pengirim'] == 'admin' ? 'bubble-admin' : 'bubble-customer';
                            $nama  = $row['pengirim'] == 'admin' ? 'Admin' : $row['kode_customer'];
                            $waktu = date('d M Y H:i', strtotime($row['waktu']));
                            ?>
                            <div style="display:flex; flex-direction:column; align-items: <?= $row['pengirim'] == 'admin' ? 'flex-end' : 'flex-start' ?>">
                                <div class="bubble-name"><?= $nama ?></div>
                                <div class="bubble <?= $kelas ?>"><?= htmlspecialchars($row['pesan']) ?></div>
                                <div class="bubble-time"><?= $waktu ?></div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>

                <form class="chat-form" method="POST">
                    <input type="hidden" name="kode_cs" value="<?= $selected_cs ?>">
                    <input type="text" name="pesan" placeholder="Ketik balasan..." autocomplete="off">
                    <button type="submit"><i class="glyphicon glyphicon-send"></i> Kirim</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    var chatBox = document.getElementById('chatBox');
    if(chatBox) chatBox.scrollTop = chatBox.scrollHeight;
</script>

<?php include '../footer.php'; ?>