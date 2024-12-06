<?php
session_start();
require_once '../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../../index.php');
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Pump</title>
    <!-- <link rel="stylesheet" href="../assets/css/homepage.css"> -->
    <link rel="shortcut icon" href="../assets/img/wings1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../../../styles/form.css"> -->
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* border: 1px solid; */
    }

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container {
        min-width: 1350px;
        margin-left: 14%;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
        font-size: 12px;
    }

    th {
        background-color: #f2f2f2;
    }

    .form {
        padding: 5px;
    }

    .judul {
        padding: 10px;
    }

    .bold {
        font-weight: bold;
    }

    .left {
        text-align: left;
    }

    .left-top {
        text-align: left;
        vertical-align: top;
    }

    td {
        height: 20px;
    }

    .kondisi {
        width: 70px;
    }

    .keterangan {
        width: 350px;
    }

    .biru {
        border: 2px solid blue;
        padding:3px;
    }

    .merah{
        border: 2px solid red;
        padding:3px;
    }
</style>

<body>
    <div class="container">
        <div class="form">
            <div class="judul">
                <table border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">

                    <!-- JUDUL -->
                    <thead>
                        <tr>
                            <th rowspan="4" colspan="2">
                                <img src="../../../assets/BAS_logo.png" alt="logo" style="width: 100%; height: 30%;">
                            </th>
                            <th colspan="9" rowspan="2">
                                <h1 style="margin: 0;">LAPORAN MAINTENANCE MOTOR & POMPA UTILITY</h1>
                            </th>
                        </tr>
                        <tr></tr>
                        <tr>
                            <th colspan="9" rowspan="2" style="text-align: center;">
                                <h1 style="margin: 0;">PT BUMI ALAM SEGAR</h1>
                            </th>
                        </tr>
                    </thead>

                    <tbody style="border: none;">
                        <!-- INPUTAN DATE, WAKTU & SELECT -->
                        <tr style="display: flex; justify-content: space-around;margin-top:10px;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600;">Tanggal:</p>
                                <input type="date" name="date" id="date">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Nama Mesin:</p>
                                <input type="text" name="namaMesin" id="namaMesin">
                            </td>
                        </tr>

                        <tr style="display: flex; justify-content: space-around;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 20px;font-size:15px;font-weight:600;">Waktu:</p>
                                <input type="time" name="waktu" id="waktu">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Paket:</p>
                                <select name="paket" id="paket">
                                    <option value="Z">Z</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>

                        <!-- HEADER -->
                        <tr>
                            <td colspan="1">
                                <h3>Mesin</h3>
                            </td>
                            <td colspan="5">
                                <h3>Jenis Pemeliharaan</h3>
                            </td>
                            <td colspan="1">
                                <h3>Kondisi</h3>
                            </td>
                            <td colspan="4">
                                <h3>Keterangan</h3>
                            </td>
                        </tr>

                        <!-- MOTOR -->
                        <div class="motor">
                            <tr>
                                <td rowspan="8">Motor</td>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check electrical</td>
                                <td>
                                    <input type="text" name="kondisi_motor1" id="kondisi_motor1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor1" id="keterangan_motor1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Cek putaran motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor2" id="kondisi_motor2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor2" id="keterangan_motor2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check fibrasi dan suara motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor3" id="kondisi_motor3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor3" id="keterangan_motor3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check bearing</td>
                                <td>
                                    <input type="text" name="kondisi_motor4" id="kondisi_motor4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor4" id="keterangan_motor4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Pelumasan motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor5" id="kondisi_motor5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor5" id="keterangan_motor5" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Kebersihan unit dan body motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor6" id="kondisi_motor6" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor6" id="keterangan_motor6" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_motor1" id="pemeliharaan_motor1" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_motor7" id="kondisi_motor7" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor7" id="keterangan_motor7" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_motor2" id="pemeliharaan_motor2" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_motor8" id="kondisi_motor8" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor8" id="keterangan_motor8" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!-- POMPA -->
                        <div class="pompa">
                            <tr>
                                <td rowspan="10">Pompa</td>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check putaran pompa</td>
                                <td>
                                    <input type="text" name="kondisi_pompa1" id="kondisi_pompa1" class="kondisi merah">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa1" id="keterangan_pompa1" class="keterangan merah">
                                </td>d>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check shaft dan karet coupling</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check fan belt</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check pressure pompa</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check mechanical seal</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check gasket pompa</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check impeler</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Kebersihan unit dan body</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                        </div>

                        <!-- AKSESORIS -->
                        <div class="aksesoris">
                            <tr>
                                <td rowspan="7">Aksesoris</td>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check Valve</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check Cek valve</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check Flow meter</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check Strainer</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check alat ukur</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check kelengkapan baut mur</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                        </div>

                        <!-- GEARBOX -->
                        <div class="gearbox">
                            <tr>
                                <td rowspan="7">Gearbox</td>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Penambahan/penggantian oli</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check unit dan area</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check oil seal</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check filter udara</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left">Check bearing</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                        </div>

                        <!-- ROW KOSONG -->
                        <tr>
                            <td colspan="11"></td>
                        </tr>

                        <!-- TINDAKAN KOREKTIF -->
                        <tr>
                            <td colspan="6" style="border-bottom: none;">
                                <h3 class="left">Tindakan Korektif :</h3>
                            </td>
                            <td colspan="5">
                                <h3 class="left">Kebutuhan Material :</h3>
                            </td>
                        </tr>

                        <!-- DESKRIPSI & JUMLAH -->
                        <tr>
                            <td colspan="6" rowspan="17" style="border-top: none;"></td>
                            <td colspan="4">
                                <h3>Deskripsi</h3>
                            </td>
                            <td>
                                <h3>Jumlah</h3>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <!-- DIBUAT -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Dibuat :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Teknisi</p>
                            </td>
                        </tr>

                        <!-- DIKETAHUI : REJA FIRMANSYAH -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diketahui : Reja Firmansyah</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff Engineering</p>
                            </td>
                        </tr>

                        <!-- DITERIMA -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diterima :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff User</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="11" style="text-align: right;">
                                <h2>FRM/EUT/01/009/009-02</h2>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>

        <button><a href="../pdf/pump.php"> Cetak</button></a>

</body>

</html>