<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keberatan Informasi-{{ $data->no_keberatan_informasi }}</title>


    <style>
        /* add body to center in dompdf */
        body {
            margin: 0 auto;
            width: 800px;
        }
    </style>
</head>

<body>
    <center>
        <table width="535">
            <tr>
                <!-- Kolom untuk Teks -->
                <td
                    style="width: 100%; vertical-align: middle; text-align: center; font-family: 'Times New Roman', Times, serif; font-size: 13px;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logopemkot.png'))) }}"
                        alt="Logo" width="90" height="120" style="position: absolute; z-index: 10; top: -10">
                    <center style="margin-left: 20">
                        <font size="4"><b>PEMERINTAH KOTA BOGOR</b> </font><br />
                        <font size="4"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></font><br />
                        <font size="3">Jl. Ir. H. Juanda No. 10, Bogor Tengah, Kota Bogor, Jawa Barat 16121</font>
                        <br />
                        <font size="3">Telp. (0251) 8321075 Faksimile (0251) 8326530</font><br />
                        <font size="3">https://kominfo.kotabogor.go.id/
                        </font><br />
                    </center>
                </td>
            </tr>
            <td colspan="2">
                <hr style="border: 1px solid" />
            </td>
        </table>
        <table width="540">
            <tr>
                <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold"
                    class="text">
                    <u>PERNYATAAN KEBERATAN ATAS INFORMASI PUBLIK</u>
                </td>
            </tr>
        </table>
        <table width="" style="font-weight: bold; padding-top: 10">
            <tr>
                <td>A. </td>
                <td>INFORMASI PENGEJUAN KEBERATAN</td>
            </tr>
        </table>
        <table width="540" style="padding-left: 15; padding-top: 2;">
            <tr>
                <td width="180" style="font-weight: bold">No. Registrasi Keberatan</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->no_keberatan_informasi }}
                </td>
            </tr>
            <tr>
                <td width="180" style="font-weight: bold">Nomor Pendaftar Permintaan Informasi</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->keputusanInformasi->tandaBukti->permohonanInformasi->no_permohonan_informasi }}
                </td>
            </tr>
            <tr>
                <td width="180" style="font-weight: bold">Tujuan Penggunaan Informasi</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->keputusanInformasi->tandaBukti->permohonanInformasi->tujuan_informasi }}
                </td>
            </tr>
            <tr>
                <td width="180" style="font-weight: bold">Identitas Pemohon</td>
                <td width="10"></td>
                <td width="335"> </td>
            </tr>
        </table>
        <table width="540" style="padding-left: 50">
            <tr>
                <td width="145">Nama</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->nama }}</td>
            </tr>
            <tr>
                <td width="145">Alamat</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->alamat }} </td>
            </tr>
            <tr>
                <td width="145">Pekerjaan</td>
                <td width="10">:</td>
                <td width="335"> {{ $data->pemohon->pekerjaan }}</td>
            </tr>
            <tr>
                <td width="145">Nomor Telepon</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->no_tlp }}</td>
            </tr>
            <tr>
                <td width="145" style="font-weight: bold; padding-top: 2">Identitas Kuasa Pemohon</td>
                <td width="10"></td>
                <td width="335"></td>
            </tr>
            <tr>
                <td width="145">Nama</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->nama_kuasa }}</td>
            </tr>
            <tr>
                <td width="145">Alamat</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->alamat_kuasa }}</td>
            </tr>
            <tr>
                <td width="145">Nomor Telepon</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->no_tlp_kuasa }}</td>
            </tr>
        </table>
        <table style="padding-top: 8">
            <tr>
                <td><strong>B. ALASAN PENGAJUAN KEBERATAN</strong></td>
            </tr>
        </table>
        <table style="padding-left: 15">
            @foreach ($kategorikeb as $id => $description)
                <tr>
                    <td width="30">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/' . ($data->kategori_keberatan_id == $id ? 'check' : 'square') . '.png'))) }}"
                            style="width: 15px; height: 15px;">
                    </td>
                    <td width="10">{{ chr(96 + $id) }}.</td>
                    <td width="335">{{ $description }}</td>
                </tr>
            @endforeach
        </table>
        <table style="padding-top: 8">
            <tr>
                <td><strong>C. KASUS POSISI</strong></td>
            </tr>
        </table>
        <table width="535">
            <hr style="border: 1px solid;" />
        </table>
        <table style="padding-top: 8">
            <tr>
                <td><strong>D. HARI/TANGGAL TANGGAPAN ATAS KEBERATAN AKAN DIBERIKAN :</strong></td>
            </tr>
        </table>
        <table width="530" style="text-align: justify">
            <tr>
                <td>Demikian keberatan ini saya sampaikan, atas perhatian dan tanggapannya, saya ucapkan terimakasih.
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
