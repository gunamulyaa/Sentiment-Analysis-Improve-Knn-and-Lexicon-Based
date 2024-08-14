<style type="text/css">
	


	ul.cloud {
		list-style: none;
		padding-left: 0;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		line-height: 2.75rem;
		width: 50%;
	}

	ul.cloud a {
  /*   
  Not supported by any browser at the moment :(
  --size: attr(data-weight number); 
  */
  --size: 1px;
  --color: #a33;
  color: var(--color);
  font-size: 50px;
  display: block;
  padding: 0.125rem 0.25rem;
  position: relative;
  text-decoration: none;
  /* 
  For different tones of a single color
  opacity: calc((15 - (9 - var(--size))) / 15); 
  */

}

<?php 	
$query=mysqli_query($koneksi,"select term, count(term) c from stemming group by term order by c desc") or die(mysqli_error($koneksi));
while($row=mysqli_fetch_array($query))
{

	?>		

	ul.cloud a[data-weight="<?php echo $row['c']; ?>"] { --size: <?php echo $row['c']; ?>; }

<?php } ?>

	ul[data-show-value] a::after {
		content: " (" attr(data-weight) ")";
		font-size: 1rem;
	}

	ul.cloud li:nth-child(2n+1) a { --color: #181; }
	ul.cloud li:nth-child(3n+1) a { --color: #33a; }
	ul.cloud li:nth-child(4n+1) a { --color: #c38; }

	ul.cloud a:focus {
		outline: 1px dashed;
	}

	ul.cloud a::before {
		content: "";
		position: absolute;
		top: 0;
		left: 50%;
		width: 0;
		height: 50%;
		background: var(--color);
		transform: translate(-50%, 0);
		opacity: 0.15;
		transition: width 0.25s;
	}

	ul.cloud a:focus::before,
	ul.cloud a:hover::before {
		width: 50%;
	}

	@media (prefers-reduced-motion) {
		ul.cloud * {
			transition: none !important;
		}
	}



</style>

<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><span class="fas fa-fw fa-chart-o"></span> Kata Yang Paling Sering Muncul (Data Latih + Data Uji)</h6>
		</div>
		<div class="card-body">
			
			<ul class="cloud" role="navigation" aria-label="Webdev tag cloud">

				<?php 	
				$query=mysqli_query($koneksi,"select term, count(term) c from stemming group by term order by c desc limit 15") or die(mysqli_error($koneksi));
				while($row=mysqli_fetch_array($query))
				{

					?>			
					<li><a data-weight="<?php echo $row['c']; ?>" href="#" title="<?php echo $row['c']; ?>"><?php echo $row['term']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>