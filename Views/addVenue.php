<h1>
	Добавить заведение			
</h1> 

<form>
	<input type="hidden" name="cmd" value="AddVenue"/>

	<?php echo $request->getFeedbackString() ?>

	<input type="text" name="venueName" />

	<input type="submit" value="Добавить">
</form>