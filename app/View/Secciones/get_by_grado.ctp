<!-- file path View/Subcategories/get_by_category.ctp -->

<?php foreach ($secciones as $key => $value): ?>
<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>