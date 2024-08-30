<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .tabel1 {
            border-collapse: collapse;
            /* Merges borders for a clean look */
            width: 100%;
            /* Adjust as needed */
        }

        .tabelKOP {
            border-collapse: collapse;
            /* Merges borders for a clean look */
            width: 100%;
            /* Adjust as needed */
        }

        .tabelKOP td {
            /* Styles table cells (both data and header cells) */
            padding: 8px;
            text-align: center;
            /* Adjust as needed */
        }

        .tabel1 td {
            /* Styles table cells (both data and header cells) */
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            /* Adjust as needed */
        }

        .tabel1 th {
            /* Styles table cells (both data and header cells) */
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            background-color: lightgray;
            /* Adjust as needed */
        }
    </style>

</head>

<body>
    <table class="tabelKOP" style="border-color: black !important;border-bottom-style:double !important;line-height:1.3;">
        <tr>
            <td style="width: 20% !important;" class="text-start">
                <img src="<?= base_url('assets/img/logo/kop.jpg'); ?>" width="70">
            </td>
            <td class="text-center">
                <span style="font-size: 15px;font-weight:bolder">MADRASAH DINIYAH TAKMILIYAH AWALIYAH</span><br>
                <span style="font-size: 15px;font-weight:bolder">Al-Ishlah</span><br>
                <span style="font-size: 10px;">Sekretariat: Jalan Terusan Kopo Km. 13,2 Blk No 204 RT 003/005</span><br>
                <span style="font-size: 10px;">Desa/Kec. Katapang Kab. Bandung Provinsi Jawa Barat 40971 Tlp. 085314093853</span><br>
            </td>
            <td style="width: 20% !important;" class="text-start">
                <img src="<?= base_url('assets/img/logo/kop.jpg'); ?>" width="70">
            </td>
        </tr>
    </table><br>

    <table width="100%" class="tabel1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
                <th>Silabus</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data1 as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $row->kode ?></td>
                    <td><?= $row->nama ?></td>
                    <td><a href="<?= base_url('assets/doc/silabus/') . $row->silabus ?>" target="_blank">Silabus</a></td>
                    <td><?= $row->deskripsi ?></td>
                    <td><?= tanggal_indonesia(date('Y-m-d', $row->tgl_dibuat)) ?> <?= date('H:i:s', $row->tgl_dibuat) ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <table style="margin-top: 100px; width:100%">
        <tr>
            <td style="width: 25% !important;text-align:center;">
                Katapang, <?= tanggal_indonesia(date('Y-m-d')) ?> <br>
                Walikelas<br><br><br><br><br>
                (.................................................)
            </td>
            <td style="width: 50% !important;"></td>
            <td style="text-align:center">
                Mengetahui, <br>
                Kepala Sekolah<br><br><br><br><br>
                (.................................................)
            </td>
        </tr>
    </table>

</body>

</html>