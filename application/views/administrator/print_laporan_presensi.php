<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<style type="text/css">
	body {
		color: #333;
	}

	table {
		width: 100%;
	    border-collapse: collapse;
	    font-size: 12px;
	}

	p {
		font-size: 12px;
	}

	.custom-table {
		width: 100%;
	}

	.custom-table thead {
		background-color: #e1e1e1;
	}

	.custom-table tr > th, .custom-table tr > td {
		border: 1px solid #ccc;
		box-shadow: none;
		padding: 5px;
	}

	.text-center {
		text-align: center;
	}

	.text-right {
		text-align: right;
	}

	.top-table {
		margin-bottom: 10px;
	}

	.top-table tr > td {
		padding: 3px 10px;
	}

	.img-small {
		width: 100px;
	}

	.page-break { display: block; page-break-after: always; }	
</style>
	<center>
		<div class="content-wrapper"> 
			<strong style="font-size: 15px;">Laporan Presensi Siswa</strong>
			<br>
			
		</div>
	</center>
	<br>
	<br>
    <h5>Tahun Ajaran : 2022/2023<br>Bulan : <?php setlocale(LC_ALL, 'IND'); echo strftime('%B %Y'); ?></h5>
	<table class="custom-table">
        <thead>
            <tr>
				<th class="text-center" rowspan="2">NO</th>
				<th class="text-center" rowspan="2">NAMA</th>
				<th class="text-center" colspan="8">PERTEMUAN KE</th>
				<th class="text-center" rowspan="2">TOTAL REALISASI KEHADIRAN</th>
            </tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
			</tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
				foreach($presensi as $pr):
            ?>
            <tr>
                <td><?= $no++ ?></td>
				<td><?= $pr->nama_lengkap; ?></td>
				<td><?= $pr->w1; ?></td>
				<td><?= $pr->w2; ?></td>
				<td><?= $pr->w3; ?></td>
				<td><?= $pr->w4; ?></td>
				<td><?= $pr->w5; ?></td>
				<td><?= $pr->w6; ?></td>
				<td><?= $pr->w7; ?></td>
				<td><?= $pr->w8; ?></td>
				<td><?= $pr->total_realisasi ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
        <!-- <tfoot>
            <tr>

                <td class="text-right">111</td>
                <td class="text-right">222</td>
                <td class="text-right">333</td>
                <td class="text-right">444</td>
                <td class="text-right">555</td>
                <td class="text-right">666</td>
            </tr>
        </tfoot> -->
    </table>
    <script type="text/javascript">window.print();</script>
    <br>
</body>
</html>