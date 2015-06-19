<?php /* Smarty version Smarty-3.1.13, created on 
         compiled from "./templates/baza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14666024225392e4ebe3cef1-13151452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aafa06e09b344224ec2b9bfb59d62e1233af36e5' => 
    array (
      0 => './templates/baza.tpl',
      1 => 1393346269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14666024225392e4ebe3cef1-13151452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'kategorie' => 0,
    'kat' => 0,
    'kategoria' => 0,
    'licznik' => 0,
    'obrazki' => 0,
    'obraz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5392e4ebe7e4f5_40679975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5392e4ebe7e4f5_40679975')) {function content_5392e4ebe7e4f5_40679975($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<div class="container">
	<div class="row">	
        <div class="col-lg-2 text-left">
       <ul> tabela - kategorie
       <?php  $_smarty_tpl->tpl_vars['kat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['kategorie']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kat']->key => $_smarty_tpl->tpl_vars['kat']->value){
$_smarty_tpl->tpl_vars['kat']->_loop = true;
?>         
            <li><a href="baza.php?kat=<?php echo $_smarty_tpl->tpl_vars['kat']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['kat']->value->nazwa;?>
 id=<?php echo $_smarty_tpl->tpl_vars['kat']->value->id;?>
</a></li>   
        <?php } ?>
        </ul>
        </div>
		
        <div class="col-lg-10 text-center">		
            <h5>Obrazy w kategorii: <?php echo $_smarty_tpl->tpl_vars['kategoria']->value->nazwa;?>
 id=<?php echo $_smarty_tpl->tpl_vars['kategoria']->value->id;?>
  obrazków <strong><?php echo $_smarty_tpl->tpl_vars['licznik']->value;?>
</strong><h5>	

<?php  $_smarty_tpl->tpl_vars['obraz'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['obraz']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['obrazki']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['obraz']->key => $_smarty_tpl->tpl_vars['obraz']->value){
$_smarty_tpl->tpl_vars['obraz']->_loop = true;
?>

		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/<?php echo $_smarty_tpl->tpl_vars['obraz']->value['katalog'];?>
/<?php echo $_smarty_tpl->tpl_vars['obraz']->value['plik'];?>
" class="thumbnail" width="110px" alt=""></a>
		<div class="caption"><?php echo $_smarty_tpl->tpl_vars['obraz']->value['plik'];?>
 id=<?php echo $_smarty_tpl->tpl_vars['obraz']->value['id'];?>
</div> 
			<div class="tooltip_a">
				<img src="../galeria/<?php echo $_smarty_tpl->tpl_vars['obraz']->value['katalog'];?>
/<?php echo $_smarty_tpl->tpl_vars['obraz']->value['plik'];?>
" alt="">
				<div class="caption"><?php echo $_smarty_tpl->tpl_vars['obraz']->value['plik'];?>
</div>
			</div>
		</div>

<?php } ?>			
</div>
</div>
</div>







<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>