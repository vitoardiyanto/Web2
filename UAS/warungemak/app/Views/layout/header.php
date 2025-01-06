<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Warung Emak</title>
    <link rel="icon" href="<?= base_url('logo.ico') ?>" type="image/x-icon">

    <link href="<?= base_url('/css/sb-admin-2.min.css'); ?>" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">




    <!-- Custom styles for this template-->





    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Staatliches&display=swap');
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        /* MENGHILANGKAN BLANK PUTIH SAAT RELOAD PAGE */
        /* Hide body saat halaman Loading */
        body {
            visibility: hidden;
            background-color: #141212;
        }

        body.loaded {
            visibility: visible;
        }

        #loading {
            display: flex;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #0009;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        body.loaded #loading {
            display: none;
        }
    </style>


</head>

<!-- Untuk Tampilan Loading Page -->
<div id="loading">
    <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Background Warung Emak -->

<body class="animated fadeIn" style="background-image: url('<?= base_url('img/bg1.jpg'); ?>'); background-attachment: fixed;">


    <!-- MODAL -->
    <!-- Pop up1 -->
    <div class="modal bgmodalred align-content-center" id="popup1">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent text-white" style="border: none;">
                <div class="modal-header" style="border-bottom: none;">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5>SEGERA HADIR</h5>
                </div>
            </div>
        </div>
    </div>
    <!--Pop Up1 Berakhir-->

    <!-- Pop up pesanan -->
    <div class="modal bgmodalred align-content-center" id="popuppesan">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent text-white" style="border: none;">
                <div class="modal-header" style="border-bottom: none;">
                    <h5 class="modal-title">Pilih Pesanan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <a href="menu" type="button"
                        class="btn btn-danger btn-lg btn-block w-100 textshadow">Pesan</a>
                </div>
            </div>
        </div>
    </div>
    <!--Pop Up pesanan Berakhir-->

    <!-- MODAL END -->