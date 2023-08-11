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
			<strong style="font-size: 15px;">Laporan Siswa <br>Realisasi Agenda Pembelajaran</strong>
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
                <th class="text-center">Mata Pelajaran</th>
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
    </table>

	<hr>
	


	<?php
        foreach ($detail as $pr) :
    ?>
	<h5>Realisasi Kehadiran Siswa</h5>
	<h5>Nama Siswa : <?= $pr->nama_lengkap; ?><br>
	Kelas : <?= $pr->kelas; ?></h5>
	<?php endforeach; ?>
	
	<table class="custom-table">
		<thead>
			<tr>
				<th class="text-center" rowspan="2">NO</th>
				<th class="text-center" rowspan="2">NAMA</th>
				<th class="text-center" rowspan="2">KELAS</th>
				<th class="text-center" rowspan="2">BULAN</th>
				<th class="text-center" colspan="8">KEHADIRAN PADA PERTEMUAN KE</th>
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
			foreach($presensi as $pr): ?>
			<tr>
			<td width="20px;"><?= $no++; ?></td>
			<td><?= $pr->nama_lengkap; ?></td>
			<td><?= $pr->kelas; ?></td>
			<td><?= $pr->bulan; ?></td>
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
  	</table>
    <script type="text/javascript">window.print();</script>
    <br>
</body>
</html>