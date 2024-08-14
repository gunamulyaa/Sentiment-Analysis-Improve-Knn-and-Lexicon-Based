<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><span class="fas fa-fw fa-chart-o"></span> Kamus Lexicon-Based</h6>
		</div>
		<div class="card-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> 
				<li class="fa fa-plus"></li> Add Data
			</button>
			<br><br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th>No</th>
						<th>Kata</th>
						<th>Sentiment</th>
                        <th>Option</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    $no = 1;
                    $sql =  mysqli_query($koneksi,"SELECT * FROM kamus join sentiment on kamus.code_sentiment = sentiment.code_sentiment  ORDER BY id DESC");
                    while($data = mysqli_fetch_array($sql)) { 
                    $code = $data['code_sentiment'];
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['kata']; ?></td>
                            <td><?php echo $data['name_sentiment']; ?></td>
                            <td>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $data['id'];?>" title="Delete kamus"><span class="fa fa-trash"></span></a>
								<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-<?php echo $data['id'];?>" title="Edit Kamus"><span class="fa fa-edit"></span></a>  
                                <br><br>
                                
                            </td>
                        </tr>

						<!-- Modal edit -->
						<div class="modal fade" id="edit-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Data Uji</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form action="index.php?halaman=edit_data&type=kamus" method="POST" enctype="multipart/form-data">
								<div class="modal-body">

								<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Text</label>
									<div class="col-md-10">
									<textarea name="kata" id="kata" class="form-control" rows="3" required="required" placeholder="document"><?php echo $data['kata'];?></textarea>
									</div>
								</div>
								<div class="form-group">
								<label class="col-md-2 col-form-label">Sentimen</label>
									<div class="col-md-10">
									<select class="form-control" name="code_sentiment" id="kat" required="required">
										<option value="<?php echo $data['code_sentiment'];?>"><?php echo $data['name_sentiment']; ?></option>
										<?php
										$query_s= mysqli_query($koneksi,"SELECT * FROM sentiment") or die(mysqli_error());
										while($data_s = mysqli_fetch_array($query_s)){
										if ($code == $data_s['code_sentiment']) {
											continue;
										}
										?>
										<option value="<?php echo $data_s['code_sentiment']; ?>"><?php echo $data_s['name_sentiment']; ?>
										</option>
										<?php } ?>

										</select>
									</div>
									</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								</form>
							</div>
							</div>
						</div>


							<!-- Modal Delete -->
							<div class="modal fade" id="delete-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Delete Kamus Kata</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<form action="index.php?halaman=delete_data&type=kamus" method="POST">
											<div class="modal-body">
												<h5>Are You Sure You Want To Delete This Data?</h5>
												<input type="hidden" name="id" value="<?php echo $data['id'];?>">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <?php $no++;  } ?>
						</tbody>
					</table>

				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Kamus Kata</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<form action="index.php?halaman=insert_kamus" method="POST" enctype="multipart/form-data">
							<div class="modal-body">

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Kamus Kata</label>
									<div class="col-md-10">
										<textarea name="kata" id="kata" class="form-control" rows="3" required="required" placeholder="kata"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 col-form-label">Sentiment</label>
									<div class="col-md-10">
										<select class="form-control" name="code_sentiment" id="kat" required="required" >
											<option value="0" selected disabled="true">--Pilih Sentiment--</option>
											<?php
											$query= mysqli_query($koneksi,"SELECT * FROM sentiment") or die(mysqli_error());
											while($data = mysqli_fetch_array($query)){
												?>
												<option value="<?php echo $data['code_sentiment']; ?>"><?php echo $data['name_sentiment']; ?>
												</option>
											<?php } ?>
										</select>				
									</div>
								</div>
							</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					$(document).ready(function(){

						$('#example1').dataTable();
					});
				</script>

				<!-- Modal -->
				<!-- <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Import Data CSV</h4>
							</div>

							<form action="input_csv_latih.php" method="POST" enctype="multipart/form-data">
								<div class="modal-body">

									<div class="form-group row">
										<label class="col-md-2 col-form-label">File CSV</label>
										<div class="col-md-10">
											<input type="file" name="file" id="file" accept=".csv">
										</div>
									</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div> -->




