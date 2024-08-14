<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><span class="fas fa-fw fa-chart-o"></span> Hasil Filtering Dan Stemming</h6>
		</div>
		<div class="card-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Document</th>
                    <th>Hasil Filtering & Stemming</th>
                    <th>Klasifikasi Lexicon-Based</th>
                  </tr>
                  </thead>
                  <tbody id="list-data">
                   <?php 
                      $query=mysqli_query($koneksi,"SELECT * from documents join sentiment on documents.code_sentiment = sentiment.code_sentiment") or die(mysqli_error());
                      while($row=mysqli_fetch_array($query))
                      {
                        $doc_id = $row['doc_id'];
                      ?>
                      <tr>
                      <td><?php echo $row['doc_id']; ?></td>
                      <td><?php echo $row['document']; ?></td>
                        <td>
                          <?php 
                      $query_stemming=mysqli_query($koneksi,"select * from stemming where doc_id = '$doc_id' && code_sentiment != 'data_uji'") or die(mysqli_error());
                      while($row_stemming=mysqli_fetch_array($query_stemming))
                      {
                      ?>
                      <?php echo $row_stemming['term']; ?>
                      <?php } ?>
                        </td>
                        <td>
                        <?php echo $row['name_sentiment']; ?>
                        </td>
                      </tr>
                      <?php 
                      } 
                    ?>
                  </tbody>
                </table>
              </div>
              </div>

                <script type="text/javascript">
        $(document).ready(function(){

          $('#example1').dataTable();
        });
      </script>