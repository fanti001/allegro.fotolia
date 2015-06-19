<?php /* Smarty version Smarty-3.1.13, created on 
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18097994145392e4e5ab5877-03752208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1393346270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18097994145392e4e5ab5877-03752208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'foldery' => 0,
    'folder' => 0,
    'katalog' => 0,
    'obrazy' => 0,
    'obraz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5392e4e5aea5b3_42088793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5392e4e5aea5b3_42088793')) {function content_5392e4e5aea5b3_42088793($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<div class="container">
	<div class="row">	
		<div class="col-lg-12 text-center">		
			<h5>Dostępne foldery:<h5>	
<?php  $_smarty_tpl->tpl_vars['folder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['folder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['foldery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['folder']->key => $_smarty_tpl->tpl_vars['folder']->value){
$_smarty_tpl->tpl_vars['folder']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
 - -
<?php } ?>
	<form class="form form-control" action="foldery.php" method="get" style="height: 60px; border: 0px solid black; box-shadow: 0 0 0;">
		<input type="text" name="folder" class="input">
		<button type="submit" class="btn btn-primary btn-info ">przeglądaj zdjęcia</button>
	</form>
</div></div>			
	<div class="container">
	<div class="row">	
			<div class="col-lg-11">
	<h3>../galeria/<?php echo $_smarty_tpl->tpl_vars['katalog']->value;?>
</h3>
			</div>

<?php  $_smarty_tpl->tpl_vars['obraz'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['obraz']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['obrazy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['obraz']->key => $_smarty_tpl->tpl_vars['obraz']->value){
$_smarty_tpl->tpl_vars['obraz']->_loop = true;
?>

		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/<?php echo $_smarty_tpl->tpl_vars['katalog']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['obraz']->value->plik;?>
" class="thumbnail" width="110px" alt=""></a>
		<div class="caption"><?php echo $_smarty_tpl->tpl_vars['obraz']->value->plik;?>
</div> 
			<div class="tooltip_a">
				<img src="../galeria/<?php echo $_smarty_tpl->tpl_vars['katalog']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['obraz']->value->plik;?>
" alt="">
				<div class="caption"><?php echo $_smarty_tpl->tpl_vars['obraz']->value->plik;?>
</div>
			</div>
		</div>

<?php } ?>			
</div>
</div>
</div>







<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>