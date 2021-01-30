<h1 class="jumbotron-heading">Добавь сотрудника</h1>
<p>
	<form>		
		<input type="hidden" name="cmd" value="AddEmployees">
		<input type="hidden" name="companyId" value="<?php echo $request->getProperty('companyId') ?>">
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">ФИО</label>

			<div class="col-sm-10">
				<input type="text" class="form-control" name="name">
			</div>
		</div>

		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Должность</label>

			<div class="col-sm-10">
				<input type="text" class="form-control" name="position">
			</div>
		</div>

		<div class="form-group row">
			<label for="manager" class="col-sm-2 col-form-label">Начальник</label>

			<div class="col-sm-10">
				<select class="form-control" name="manager">
					<option>1</option>
					<option>2</option>
				</select>				
			</div>		
		</div>

		<div class="form-group row">
			<label for="salaryType" class="col-sm-2 col-form-label">Тип оплаты</label>

			<div class="col-sm-10">
				<select class="form-control" name="salaryType">
					<option value="1">Оклад</option>
					<option value="2">По часовая</option>
				</select>				
			</div>
		</div>

		<div class="form-group row">
			<label for="salary" class="col-sm-2 col-form-label">Зарплата</label>

			<div class="col-sm-10">
				<input type="text" class="form-control" name="salary">
			</div>
		</div>								

		<button type="submit" class="btn btn-primary">Сохранить</button>
	</form>
</p>