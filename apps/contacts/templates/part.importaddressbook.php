<?php
/**
 * Copyright (c) 2012 Thomas Tanghus <thomas@tanghus.net>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
?>
<td id="importaddressbook_dialog" colspan="6">
<?php 
if(OCP\App::isEnabled('files_encryption')) { 
	echo '<strong>'.$l->t('Currently this import function doesn\'t work while encryption is enabled.<br />Please upload your VCF file with the file manager and click on it to import.').'</strong>';
} else { ?>
<table>
<tr>
	<th><?php echo $l->t('Select address book to import to:') ?></th>
	<td>
		<form id="import_upload_form" action="<?php echo OCP\Util::linkTo('contacts', 'ajax/uploadimport.php'); ?>" method="post" enctype="multipart/form-data" target="import_upload_target">
			<select id="book" name="book" class="float">
			<?php
			$contacts_options = OC_Contacts_Addressbook::all(OCP\USER::getUser());
			echo OCP\html_select_options($contacts_options, $contacts_options[0]['id'], array('value'=>'id', 'label'=>'displayname'));
			?>
			</select>
			<span id="import_drop_target" class="droptarget float"><?php echo $l->t("Drop a VCF file<br />to import contacts."); ?> (Max. <?php echo  $_['uploadMaxHumanFilesize']; ?>)</span>
			<a class="svg upload float" title="<?php echo $l->t('Select from HD'); ?>">
			<input class="float" id="import_upload_start" type="file" accept="text/*" name="importfile" /></a>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_['uploadMaxFilesize'] ?>" id="max_upload">
		</form>
	</td>
</tr>
</table>

<input id="close_button" style="float: left;" type="button" onclick="Contacts.UI.Addressbooks.cancel(this);" value="<?php echo $l->t("Cancel"); ?>">
<iframe name="import_upload_target" id='import_upload_target' src=""></iframe>
<?php } ?>
</td>
<script type="text/javascript">
$(document).ready(function(){
	Contacts.UI.Addressbooks.loadImportHandlers();
});
</script>