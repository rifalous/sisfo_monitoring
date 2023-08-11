<!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan</title>
</head>
<body>
<style type="text/css">

	body {
		color: #333;
	}

	table {
		width: 100%;
	    border-collapse: collapse;
	    font-size: 9px;
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
			<strong style="font-size: 15px;">Laporan Siswa</strong>
			<br>
			
		</div>
	</center>
	<br>
	<br>

	<table class="custom-table">
        <thead>
            <tr>
                <th class="text-center"><span class="text-uppercase">No</span></th>
                <th class="text-center"><span class="text-uppercase">Tanggal</span></th>
                <th class="text-center">Mata Pembelajaran</th>
                <th class="text-center">Materi Pembahasan</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Pengajar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                foreach ($agenda as $agd) :
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $agd->tanggal ?></td>
                <td><?php echo $agd->matapelajaran ?></td>
                <td><?php echo $agd->materi_pembahasan ?></td>
                <td><?php echo $agd->kelas ?></td>
                <td><?php echo $agd->pengajar ?></td>
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