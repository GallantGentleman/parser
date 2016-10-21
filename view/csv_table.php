<html>
<head>
	<title>CSV Table</title>
	<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
</head>
<body>
	<br>
	<br>
	<br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>№</th>
					<th>Название</th>
					<th>Описание</th>
					<th>Цена</th>
					<th>Картинка</th>
					<th>Ссылка</th>
					<th>Категория</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach($items as $item) { ?>
		
				<tr>
					<td><?=$i;?></td>
					<td><?=$item['title'];?></td>
					<td><?=$item['description'];?></td>
					<td><input type="text" class="form-control" style="width:90px;" disabled value="<?=$item['price'];?>"></td>
					<td><span class="label-warning"><?=$item['image'];?></span></td>
					<td><span class="glyphicon glyphicon-link"></span> <?=$item['url'];?></td>
					<td><?=$item['category'];?></td>
				</tr>

				<?php $i++; ?>
				<?php } ?>
			</tbody>
		</table>
</body>
</html>