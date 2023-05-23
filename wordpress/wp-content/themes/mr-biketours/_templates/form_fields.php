<div style="width:0px; height:0px; overflow:hidden;">
	<label>U can't see me</label><input type="text" value="" name="_code" /><br />
</div>


<div class="form__body   p-x-0 p-b-0">
	<h4 class="card__title    m-t-2  m-b-4  m-t-xs "><?php echo __('Please contact us','bars-theme'); ?>.</h4>

	<div class="form-group m-t-2">
		<input name="email" type="email" class="g-12 input-text js--input-check" id="input_email" required="required">
		<label for="input_email" class="g-12 label-text-placeholder "><?php echo __('E-Mail','bars-theme'); ?>*</label>
	</div>

	<!--select-->
	<div class="form-group">

		<select name="title" class="custom-select  input-select  js--input-check" id="select_anrede"  required="required">
			<option value="" selected="" disabled=""></option>
			<option value="Frau"><?php echo __('Mrs','bars-theme'); ?></option>
			<option value="Herr"><?php echo __('Mr','bars-theme'); ?></option>
		</select>
		<label for="select_anrede" class="g-12 label-text-placeholder "><?php echo __('Title','bars-theme'); ?>*</label>

	</div>
	<!--/select-->


	<div class="form-group">
		<input name="name" type="text" class="g-12 input-text js--input-check " id="input_name"  required="required">
		<label for="input_name" class="g-12 label-text-placeholder "><?php echo __('Firstname','bars-theme'); ?>, <?php echo __('Lastname','bars-theme'); ?>*</label>
	</div>


	<div class="form-group">
		<input name="company" type="text" class="g-12 input-text js--input-check " id="input_company">
		<label for="input_company" class="g-12 label-text-placeholder "><?php echo __('Company','bars-theme'); ?>*</label>
	</div>

	<div class="form-group">
		<input name="phone" type="text" class="g-12 input-text js--input-check " id="input_telefon">
		<label for="input_telefon" class="g-12 label-text-placeholder "><?php echo __('Phone','bars-theme'); ?>*</label>
	</div>

	<div class="form-group">
		<textarea name="message" type="text" class="g-12 input-textarea js--input-check " id="input_text"  required="required"></textarea>
		<label for="input_text" class="g-12 label-text-placeholder "><?php echo __('Your message','bars-theme'); ?>*</label>
	</div>

	<div class="form-group p-b-2">

		<input id="checkbox_terms" type="checkbox" name="terms" value="yes" class="checkbox-custom" required>
		<label for="checkbox_terms" class="label-checkbox text--inverse">
			Ich stimme zu, dass meine Angaben aus dem Kontaktformular zur Beantwortung
			meiner Anfrage erhoben und verarbeitet werden. Die Daten werden nach abgeschlossener Bearbeitung Ihrer Anfrage gelöscht.
			Hinweis: Sie können Ihre Einwilligung jederzeit für die Zukunft per E-Mail an <a href="mailto:info@pointdigital.de">info@pointdigital.de</a> widerrufen. Detaillierte Informationen zum Umgang mit Nutzerdaten finden Sie in unserer <a href="/datenschutz">Datenschutzerklärung</a>.*
		</label>


	</div>


</div>





