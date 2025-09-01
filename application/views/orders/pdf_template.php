<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Order Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #000;
            padding: 4px;
            vertical-align: top;
        }
        .no-border td, .no-border th {
            border: none;
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
        .section-title {
            background: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <table class="no-border">
        <tr>
            <td style="width: 60%">
                <strong>KLA Computer</strong><br>
                Ruko Mataram Jasa Blok D/14, Jl. MT Haryono 872 F/23<br>
                Kota Semarang<br>
                Jawa Tengah 50613<br>
                Telp : 08993201657
            </td>
            <td style="width: 40%" align="right">
                <strong>CUSTOMER ORDER FORM (COF)</strong><br>
                COF ID : ___________________
            </td>
        </tr>
    </table>
    <br>

    <!-- Dates -->
    <table>
        <tr>
            <td>Received Date</td>
            <td>Started Date</td>
            <td>Finished Date</td>
        </tr>
        <tr>
            <td style="height: 25px"></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <!-- Customer -->
    <p><strong>CUSTOMER</strong></p>
    <table>
        <tr>
            <td>Contact (Nama/Perusahaan)</td>
            <td>Customer Name</td>
        </tr>
        <tr>
            <td style="height: 25px"></td>
            <td></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>Phone Number</td>
        </tr>
        <tr>
            <td style="height: 25px"></td>
            <td></td>
        </tr>
    </table>

    <!-- Service Unit -->
    <p><strong>SERVICE UNIT</strong></p>
    <table>
        <tr>
            <td>Product Number</td>
            <td>Serial Number</td>
        </tr>
        <tr>
            <td style="height: 25px"></td>
            <td></td>
        </tr>
        <tr>
            <td>Nama Type</td>
            <td>Fault Description</td>
        </tr>
        <tr>
            <td style="height: 25px"></td>
            <td></td>
        </tr>
    </table>

    <!-- Accessories -->
    <p><strong>ACCESSORIES</strong></p>
    <table>
        <tr>
            <td style="height: 40px"></td>
        </tr>
    </table>

    <!-- Kondisi Unit -->
    <p><strong>KONDISI UNIT</strong></p>
    <table>
        <tr>
            <td style="height: 40px"></td>
        </tr>
    </table>

    <!-- Repair Summary -->
    <p><strong>REPAIR SUMMARY</strong></p>
    <p style="font-size: 11px">
        **) Pihak Service Center tidak bertanggungjawab atas keamanan dan kehilangan data, harap sebelum memasukkan<br>
        service device agar data dibackup terlebih dahulu.<br>
        **) Prediksi barang diambil kembali sebelum 90 hari kerja sejak selesai service/cancel service. Setelah jangka waktu<br>
        tersebut, perangkat sepenuhnya menjadi wewenang kami untuk di-scrap.<br>
        **) Pembayaran DP min 50% sebagai syarat order part.<br>
        **) Pembayaran DP tidak dapat dikembalikan (barang yang sudah dipesan tidak dapat dicancel).
    </p>

    <!-- Biaya Service -->
    <table>
        <tr class="section-title">
            <td colspan="2">Jasa Service</td>
            <td colspan="2">Jasa Pengecekan</td>
        </tr>
        <tr>
            <td>Printer Low End / Deskjet</td><td>35.000-50.000</td>
            <td>Printer Low End / Deskjet</td><td>25.000</td>
        </tr>
        <tr>
            <td>Printer Middle Laserjet / Officejet</td><td>50.000-60.000</td>
            <td>Printer Middle Laserjet / Officejet</td><td>35.000</td>
        </tr>
        <tr>
            <td>Ink Tank Printer</td><td>70.000-80.000</td>
            <td>Ink Tank Printer</td><td>40.000</td>
        </tr>
        <tr>
            <td>Server / Work Station</td><td>100.000-125.000</td>
            <td>Server / Work Station</td><td>60.000</td>
        </tr>
        <tr>
            <td>PC / Notebook / PC All In One</td><td>45.000-60.000</td>
            <td>PC / Notebook / PC All In One</td><td>30.000</td>
        </tr>
    </table>

    <!-- Tanda tangan -->
    <br><br>
    <table>
        <tr>
            <td>Penerimaan<br><br><br><br> Tanggal: ____________</td>
            <td>Pengembalian<br><br><br><br> Tanggal: ____________</td>
        </tr>
    </table>

    <p style="font-size: 11px; text-align:center">
        Tanda tangan Anda merupakan persetujuan Anda terhadap syarat-syarat perbaikan di atas.
    </p>

</body>
</html>
