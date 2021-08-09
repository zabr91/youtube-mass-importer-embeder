<a href = "?page=<?= $_GET['page'] ?>" class="button button-primary">Назад</a>

<form action="" method="POST">

<table class="form-table" role="presentation">
<input type="text" name="id" value="<?= isset($values[0]->id) ? $values[0]->id :  "" ?>" hidden>
	<tbody>
		<tr><th scope="row">Заголовок</th>
		<td>		
		<input type="text" name="title" value="<?= isset($values[0]->title) ? $values[0]->title :  "" ?>">
		</td>
		<td>
			Используется только админпанели
		</td>
	    </tr>

        <tr><th scope="row">Запрос</th>
		<td>		
		<input type="text" name="q" value="<?= isset($values[0]->q) ? $values[0]->q : "" ?>">
		</td>
		<td>
			Используется только админпанели
		</td>
	    </tr>

		<tr><th scope="row">Частота обновлений</th>
		<td>		
		<input type="text" name="period" value="<?= isset($values[0]->period) ? $values[0]->period : "" ?>">
		</td>
		<td>
			Используется только админпанели
		</td>
	    </tr>
        


		
	    </tr>
</tbody>
</table>







<p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
</p>
</form>