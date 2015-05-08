<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<article class="module width_full relative">
		<header>
				<h3 class="tabs_involved"><?php echo 'Pubs du jeu' ; ?></h3>
		</header>
		<table id="json_pubs" class="datatable" cellspacing="0">
				<thead>
						<tr>
								<th width="50"><?php echo Kohana::lang( 'form.id' ); ?></th>
								<th width="500"><?php echo  'Description' ; ?></th>
								<th width="100"><?php echo  'element id' ; ?></th>
						</tr>
				</thead>
				<tbody>
						<tr>
								<td colspan="5" class="dataTables_empty"><?php echo Kohana::lang( 'form.loading' ); ?></td>
						</tr>
				</tbody>
		</table>
		<div class="clear"></div>
</article>