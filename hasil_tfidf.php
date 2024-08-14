<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><span class="fas fa-fw fa-chart-o"></span> Hasil TF-IDF</h6>
		</div>
		<div class="card-body">

			
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Dokumen</th>
						<th>Panjang Vektor</th>
						<th>Kemiripan Vektor</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql =  mysqli_query($koneksi,"SELECT * FROM sqrt_cross_product join result_cosine on sqrt_cross_product.doc_id = result_cosine.doc_id");
					while($data = mysqli_fetch_array($sql)) { 
						?>
						<tr>
							<td><?php echo $data['doc_id']; ?></td>
							<td><?php echo $data['result_sqrt']; ?></td>
							<td><?php echo $data['result']; ?></td>
						</tr>
							<?php  } ?>
						</tbody>
					</table>

				</div>
			</div>
			




