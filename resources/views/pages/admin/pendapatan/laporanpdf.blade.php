<!DOCTYPE html>
<html>
<head>
	<title>Download Bukti Pendapatan</title>
	<style type="text/css">
		.nav {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		.nav tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		.nav tr .text {
			text-align: center;
			font-size: 13px;
		}
		.nav tr td {
			font-size: 13px;
		}
        .table {
        border-collapse: collapse;
        width: 100%;
        }
        .table td, table th {
            border: 1px solid black;
            padding: 5px;
        }
        .td{
            text-align: center;
        }
        .pndpt{
            text-align: right;
            margin-right: 10px;
        }
	</style>
</head>
<body>
	<center>
		<table class="nav" width="530">
			<tr>
				<td>
				<center>
					<font size="5"><b>Pendapatan Raffs Coffe</b></font><br>
					<font size="2"><i>Sawangan, Kota Depok, Jawa Barat </i></font>
				</center>
				</td>
			</tr>
            
			<tr>
				<td colspan="2"><hr></td>
			</tr>
        </table>

        <br><br>
        <table>
			<tr>
				<td>Perihal</td>
				<td width="310">: Pendapatan Anda</td>
                <td>Bulan & Tahun</td>
                <td>: {{ $bln }} {{ $tahun }}</td>
			</tr>
		</table>

        <br>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor Pemesan</th>
                    <th>QTY</th>
                    <th>Date</th>
                    <th>Kode</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no= 1;
                ?>
                @foreach($pdf as $item)
                {{-- <?php
                    $jml_total += $item->total_price;
                ?> --}}

                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $item->name }}</td>
                        <td class="td">{{ $item->phone_number }}</td>
                        <td class="td">{{ $item->qty }}</td>
                        <td class="td">{{ $item->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i') }}</td>
                        <td class="td">{{ $item->kode }}</td>
                        <td class="td">Rp. {{ number_format($item->total_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th colspan="6" class="pndpt">Total Pendapatan Anda</th>
                    <td></td>
                    {{-- <th>Rp. {{ number_format($jml_total) }}</th> --}}
                </tr>
            </thead>
        </table>
    </center>
</body>
</html>
