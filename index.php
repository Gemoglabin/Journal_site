<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	
	<link rel="stylesheet" href="Css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<?php 
	$db = new SQLite3('testir.db');
	?>

</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="index.php"><img src="Img/Logo.ico" alt="" style="width: 50px;"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav w-100 d-flex justify-content-around">
						<li class="nav-item active">
							<a class="nav-link h5" href="index.php">Головна <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link h5" href="Groups.php">Група</a>
						</li>
						<li class="nav-item">
							<a class="nav-link h5" href="Template.php">Змiнити розклад</a>
						</li>
						<li class="nav-item">
							<a class="nav-link h5" href="Reports.php">Звiтнiсть</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col text-center">
				<span class="h2">
					РОЗКЛАД НА ТИЖДЕНЬ
				</span>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<hr style="border-bottom: 2px solid #1f1209;">
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<span class="h5">
					ОБЕРІТЬ ПАРУ
				</span>
			</div>
		</div>
	</div>
	


	<div class="container desktop_view">
		<div class="row">

			<div class="col timetable">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">Понедiлок</th>
						</tr>
					</thead>
					<tbody>
						<div id="exampleModalPopovers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel" style="display: none;" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalPopoversLabel">Підтвердження розкладу</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="container pl-5 pr-5">
											<label class="mr-sm-2" for="inlineFormCustomSelect">Група</label>
											<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
												<option selected>Choose...</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
											<label class="mr-sm-2 mt-4" for="inlineFormCustomSelect">предмет</label>
											<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
												<option selected>Choose...</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
											<div class="custom-control custom-switch mt-4 mb-4">
												<input type="checkbox" class="custom-control-input" id="customSwitch1">
												<label class="custom-control-label" for="customSwitch1">Порожня пара</label>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
											<button type="button" class="btn btn-primary">Пiдтвердити</button>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<?php 
					$sql="SELECT * from template where week_day='ПН';";   
						$result = $db->query($sql);
						$array = array();

						function modal_window()
						{
							echo "<br><hr><br>";

						}

						while($data = $result->fetchArray(SQLITE3_ASSOC))
						{
							$array[] = $data;
						}

						foreach($array as $row)
						{ 
							?>

							<tr>
								<th scope="row" class=" p-1"><div class="hover_tablecell" data-toggle="modal" data-target="#exampleModalPopovers" onclick="<?php> modal_window(); ?>"  style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
							</tr>

							<?php 
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">Вiвторок</th>
						</tr>
					</thead>
					<tbody class="p-2">
						<?php 
						$sql="SELECT * from template where week_day='ВТ';";   
						$result = $db->query($sql);
						$array = array();

						while($data = $result->fetchArray(SQLITE3_ASSOC))
						{
							$array[] = $data;
						}

						foreach($array as $row)
						{ 
							?>

							<tr>
								<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
							</tr>

							<?php 
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">Середа</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql="SELECT * from template where week_day='СР';";   
						$result = $db->query($sql);
						$array = array();

						while($data = $result->fetchArray(SQLITE3_ASSOC))
						{
							$array[] = $data;
						}

						foreach($array as $row)
						{ 
							?>

							<tr>
								<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
							</tr>

							<?php 
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">Четверг</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql="SELECT * from template where week_day='ЧТ';";   
						$result = $db->query($sql);
						$array = array();

						while($data = $result->fetchArray(SQLITE3_ASSOC))
						{
							$array[] = $data;
						}

						foreach($array as $row)
						{ 
							?>

							<tr>
								<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
							</tr>

							<?php 
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">П'ятниця</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql="SELECT * from template where week_day='ПТ';";   
						$result = $db->query($sql);
						$array = array();

						while($data = $result->fetchArray(SQLITE3_ASSOC))
						{
							$array[] = $data;
						}

						foreach($array as $row) 
						{ 
							?>

							<tr>
								<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
							</tr>

							<?php 
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div class="container mobile_view">
		<div class="row">
			<div class="col">
				<ul class="nav nav-tabs bg-dark" id="myTab" role="tablist">
					<li class="nav-item mb-0">
						<a class="nav-link active bg-dark text-white" id="monday-tab" data-toggle="tab" href="#monday" role="tab" aria-controls="monday" aria-selected="true">Пн</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab" aria-controls="tuesday" aria-selected="false">Вт</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" id="wednesday-tab" data-toggle="tab" href="#wednesday" role="tab" aria-controls="wednesday" aria-selected="false">Ср</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab" aria-controls="thursday" aria-selected="false">Чт</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" id="friday-tab" data-toggle="tab" href="#friday" role="tab" aria-controls="friday" aria-selected="false">Пт</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
						<table class="table table-dark text-center">
							<!-- <thead>
								<tr>
									<th scope="col">Понедiлок</th>
								</tr>
							</thead> -->
							<tbody>
								<?php 
								$sql="SELECT * from template where week_day='ПН';";   
								$result = $db->query($sql);
								$array = array();

								while($data = $result->fetchArray(SQLITE3_ASSOC))
								{
									$array[] = $data;
								}

								foreach($array as $row) 
								{ 
									?>

									<tr>
										<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
									</tr>

									<?php 
								}
								?>
							</tbody>
						</table>

					</div>
					<div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
						<table class="table table-dark text-center">
							<!-- <thead>
								<tr>
									<th scope="col">Вiвторок</th>
								</tr>
							</thead> -->
							<tbody>
								<?php 
								$sql="SELECT * from template where week_day='ВТ';";   
								$result = $db->query($sql);
								$array = array();

								while($data = $result->fetchArray(SQLITE3_ASSOC))
								{
									$array[] = $data;
								}

								foreach($array as $row)
								{ 
									?>

									<tr>
										<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
									</tr>

									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
						<table class="table table-dark text-center">
							<!-- <thead>
								<tr>
									<th scope="col">Середа</th>
								</tr>
							</thead> -->
							<tbody>
								<?php 
								$sql="SELECT * from template where week_day='СР';";   
								$result = $db->query($sql);
								$array = array();

								while($data = $result->fetchArray(SQLITE3_ASSOC))
								{
									$array[] = $data;
								}

								foreach($array as $row)
								{ 
									?>

									<tr>
										<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
									</tr>

									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
						<table class="table table-dark text-center">
							<!-- <thead>
								<tr>
									<th scope="col">Четверг</th>
								</tr>
							</thead> -->
							<tbody>
								<?php 
								$sql="SELECT * from template where week_day='ЧТ';";   
								$result = $db->query($sql);
								$array = array();

								while($data = $result->fetchArray(SQLITE3_ASSOC))
								{
									$array[] = $data;
								}

								foreach($array as $row)
								{ 
									?>

									<tr>
										<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
									</tr>

									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
						<table class="table table-dark text-center">
							<!-- <thead>
								<tr>
									<th scope="col">П'ятниця</th>
								</tr>
							</thead> -->
							<tbody>
								<?php 
								$sql="SELECT * from template where week_day='ПТ';";   
								$result = $db->query($sql);
								$array = array();

								while($data = $result->fetchArray(SQLITE3_ASSOC))
								{
									$array[] = $data;
								}

								foreach($array as $row)
								{ 
									?>

									<tr>
										<th scope="row" class=" p-1"><div class="hover_tablecell" style="padding: 8px;">
									<?php 
									

									
									$couple_name_and_group = $row['name_gr'] . " " . $row['name_couple'];
									if ($couple_name_and_group == " ")
									{
										echo "Вікно";
									}
									else
									{
										echo $couple_name_and_group;
									}
									
									
									?>

								</div></th>
									</tr>

									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>