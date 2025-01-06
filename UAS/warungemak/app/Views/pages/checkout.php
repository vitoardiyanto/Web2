<!-- Main Content -->

<!-- Main Content -->

<section class="bg-light" style="height:auto;">
    <div class="container-fluid nunito" style="padding: 100px;">
        <h2 class="text-start px-5 text-dark nunito-bold">Detail Pemesanan</h2>

        <!-- Menampilkan daftar pesanan -->
        <?php if (!empty($ItemsKeranjang)): ?>
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ItemsKeranjang as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?= base_url('uploads/menu/' . $item['gambar_menu']); ?>"
                                        class="rounded"
                                        alt="<?= $item['nama_menu']; ?>"
                                        style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                </td>
                                <td><?= $item['nama_menu'] ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>Rp <?= number_format($item['quantity'] * $item['harga'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <p class="nunito-bold">
                    Total Harga: <span id="total_harga_display">Rp <?= number_format($totalHarga, 0, ',', '.') ?></span><br>
                    <small>(Termasuk Ongkir: <span id="ongkir_display">Rp 0</span>)</small>
                </p>
            </div>

            <!-- Form Checkout -->
            <form action="<?= base_url('checkout/processCheckout') ?>" method="post">
                <input type="hidden" name="total_harga" id="total_harga_input" value="<?= $totalHarga ?>">
                <input type="hidden" name="ongkos_kirim" id="ongkos_kirim_input" value="0">
                <!-- Pilihan Jenis Pengiriman -->
                <div class="form-group mt-3">
                    <input type="radio" name="jenis_pengiriman" value="diantar" id="radio_diantar" required>
                    <label for="radio_diantar">Diantar</label>

                    <input type="radio" name="jenis_pengiriman" value="diambil" id="radio_diambil">
                    <label for="radio_diambil">Diambil</label>
                </div>

                <!-- Pilihan Wilayah Pengiriman -->
                <div class="form-group mt-3" id="wilayah_field">
                    <label for="wilayah">Wilayah Pengiriman</label>
                    <select name="id_wilayah" id="wilayah_select" class="form-control" required>
                        <option value="" data-ongkir="0">Pilih Wilayah Pengiriman</option>
                        <?php foreach ($wilayahList as $wilayah): ?>
                            <option value="<?= $wilayah['id_wilayah'] ?>" data-ongkir="<?= $wilayah['tarif_ongkir'] ?>">
                                <?= $wilayah['nama_wilayah'] ?> - Ongkir Rp. <?= number_format($wilayah['tarif_ongkir'], 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Input Alamat -->
                <div class="form-group mt-3" id="alamat_field">
                    <label for="alamat">Alamat Lengkap Pengiriman</label>
                    <textarea name="alamat" id="alamat_pengiriman" placeholder="contoh: Jalan SMA 57 RT/11 RW/6 No.29 Kedoya Utara Kebon Jeruk" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Kolom Catatan -->
                <div class="form-group mt-3">
                    <label for="tgl_pesanansiap">Dipesan Untuk Tanggal</label>
                    <textarea name="tgl_pesanansiap" placeholder="Min. 3 Hari Sebelum Pemesanan" class="form-control" rows="1" required></textarea>
                </div>

                <!-- Kolom Catatan -->
                <div class="form-group mt-3">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" placeholder="Tidak Pedas, Bagian Dada/Paha, etc (Tidak Wajib)" class="form-control" rows="4"></textarea>
                </div>

                <!-- Tombol Proses -->
                <div class="form-group text-center mt-3">
                    <a class="btn btn-danger btn-lg me-3" href="<?= base_url('keranjang'); ?>">Batal</a>
                    <button type="submit" class="btn btn-success btn-lg">Proses Pesanan</button>
                </div>
            </form>

        <?php else: ?>
            <div class="alert alert-warning">Keranjang Anda kosong!</div>
        <?php endif; ?>

    </div>
</section>





<style>
    /* Atur margin agar elemen tetap terlihat pada bagian atas, untuk tampilan mobile dan desktop */
    section.bg-light {
        margin-top: 80px;
        /* Tinggi navbar default */
        padding-top: 20px;
        /* Memberikan padding atas untuk memastikan konten tidak terlalu mepet dengan navbar */
    }

    /* Responsif di bawah 576px (mobile) */
    @media (max-width: 576px) {
        section.bg-light {
            margin-top: 120px;
            /* Menyesuaikan dengan navbar di mobile */
        }

        /* Atur padding di dalam card */
        .card {
            padding: 12px;
        }

        .card img {
            width: 100px !important;
            height: 80px !important;
        }

        .card h6 {
            font-size: 16px !important;
        }

        .card p {
            font-size: 12px !important;
        }

        .btn {
            font-size: 14px !important;
        }

        /* Mengatur tombol 'Proses Pesanan' lebih besar */
        .btn-lg {
            font-size: 14px !important;
            padding: 10px 15px !important;
        }

        .form-group textarea,
        .form-group select {
            width: 100% !important;
        }

        /* Perbaikan lebar table dan ukuran font */
        .table-responsive {
            overflow-x: auto;
        }

        .table th,
        .table td {
            font-size: 12px !important;
            text-align: center;
        }

        /* Memperlebar kolom gambar menu agar lebih nyaman dilihat */
        .table td img {
            width: 60px;
            height: 60px;
        }

        /* Memastikan field input terlihat pas */
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
        }
    }

    /* Media untuk tablet (7 hingga 8 inci) */
    @media (min-width: 577px) and (max-width: 768px) {
        section.bg-light {
            margin-top: 100px;
            /* Menyesuaikan dengan tampilan tablet */
        }
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const radioDiantar = document.getElementById("radio_diantar");
        const radioDiambil = document.getElementById("radio_diambil");
        const alamatField = document.getElementById("alamat_field");
        const alamatInput = document.getElementById("alamat_pengiriman");
        const wilayahField = document.getElementById("wilayah_field");
        const wilayahSelect = document.getElementById("wilayah_select");

        // Fungsi untuk mengatur kondisi field alamat dan wilayah
        function toggleFields() {
            if (radioDiantar.checked) {
                // Jika "Diantar", tampilkan field alamat dan wilayah
                alamatField.style.display = "block";
                alamatInput.required = true;

                wilayahField.style.display = "block";
                wilayahSelect.required = true;

            } else if (radioDiambil.checked) {
                // Jika "Diambil", sembunyikan field alamat dan wilayah
                alamatField.style.display = "none";
                alamatInput.required = false;
                alamatInput.value = "";

                wilayahField.style.display = "none";
                wilayahSelect.required = false;
            }
        }

        // Event Listener untuk radio button
        radioDiantar.addEventListener("change", toggleFields);
        radioDiambil.addEventListener("change", toggleFields);

        // Jalankan sekali di awal untuk default
        toggleFields();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const wilayahSelect = document.getElementById("wilayah_select");
        const totalHargaInput = document.getElementById("total_harga_input");
        const ongkosKirimInput = document.getElementById("ongkos_kirim_input");

        const initialTotalHarga = <?= $totalHarga ?>;

        wilayahSelect.addEventListener("change", function () {
            const selectedOption = wilayahSelect.options[wilayahSelect.selectedIndex];
            const ongkir = parseInt(selectedOption.dataset.ongkir || 0);
            totalHargaInput.value = initialTotalHarga + ongkir;
            ongkosKirimInput.value = ongkir;
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const radioDiantar = document.getElementById("radio_diantar");
        const radioDiambil = document.getElementById("radio_diambil");
        const wilayahSelect = document.getElementById("wilayah_select");
        const ongkirDisplay = document.getElementById("ongkir_display");
        const totalHargaDisplay = document.getElementById("total_harga_display");
        const ongkosKirimInput = document.getElementById("ongkos_kirim_input");
        const totalHargaInput = document.getElementById("total_harga_input");

        const initialTotalHarga = <?= $totalHarga ?>; // Total harga awal tanpa ongkir

        // Fungsi untuk menghitung ulang total harga berdasarkan jenis pengiriman dan wilayah
        function updateTotalHarga() {
            const selectedOption = wilayahSelect.options[wilayahSelect.selectedIndex];
            let ongkir = 0;

            // Jika jenis pengiriman adalah "Diantar", hitung ongkir berdasarkan wilayah
            if (radioDiantar.checked && selectedOption) {
                ongkir = parseInt(selectedOption.dataset.ongkir || 0);
            }

            const totalHargaWithOngkir = initialTotalHarga + ongkir;

            // Update tampilan ongkir dan total harga
            ongkirDisplay.textContent = `Rp ${ongkir.toLocaleString('id-ID')}`;
            totalHargaDisplay.textContent = `Rp ${totalHargaWithOngkir.toLocaleString('id-ID')}`;

            // Update nilai input untuk dikirimkan ke server
            ongkosKirimInput.value = ongkir;
            totalHargaInput.value = totalHargaWithOngkir;
        }

        // Event listeners untuk perubahan wilayah dan jenis pengiriman
        wilayahSelect.addEventListener("change", updateTotalHarga);
        radioDiantar.addEventListener("change", updateTotalHarga);
        radioDiambil.addEventListener("change", updateTotalHarga);

        // Inisialisasi awal
        updateTotalHarga();
    });
</script>
