<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                                    <div class="sidebar-brand-icon rotate-n-15">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                    <div class="sidebar-brand-text mx-3">Travel <sup>ijal</sup></div>
                                </a>
                            </td>

                            <td>
                                Invoice #: {{$bulk->id_pesanan}}<br>
                                Dibuat Tanggal: {{Carbon\Carbon::now()->format('d M y')}}<br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                CV Travelijal.<br>
                                Bandung<br>
                                Jawa Barat, Indonesia
                            </td>

                            <td>
                                <br><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Data Pemesan
                </td>

                <td>
                </td>
            </tr>

            <tr class="details">
                <td>
                    Nama Pemesan
                </td>

                <td>
                    {{$bulk->nama_penumpang}}
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Data Pesanan
                </td>

                <td>

                </td>
            </tr>

            <tr class="item">
                <td>
                    Kode Pesanan
                </td>

                <td>
                    {{$bulk->kode_pemesanan}}
                </td>
            </tr>

            <tr class="item">
                <td>
                    Tujuan
                </td>

                <td>
                    {{$bulk->tujuan}}
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Tanggal Berangkat
                </td>

                <td>
                    {{date('d M Y', strtotime($bulk->tanggal_berangkat))}}
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Transportasi
                </td>

                <td>
                    {{$bulk->keterangan}}
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Kode Transportasi
                </td>

                <td>
                    {{$bulk->kode_tp}}
                </td>
            </tr>

            <tr class="total">
                <td></td>

                <td>
                    Total Bayar: Rp {{$bulk->total_bayar}}
                </td>
            </tr>
        </table>
    </div>
    <script>
        window.print();

    </script>
</body>

</html>
