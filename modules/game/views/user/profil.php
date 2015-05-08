<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<?php if( isset( $modif ) && $modif ) : ?>
		<div class="panel">
				<div id="content_pwd">
						<div class="row_stat_user">
								<div class="title_stat_user"><?php echo Kohana::lang('user.modif_avatar'); ?> : </div>
								<div class="info_stat_user"><input type="button" value="Modifier mon avatar" id="modif_avatar" class="button" /></div>
								<div class="spacer"></div>
						</div>
						<div class="title_stat_user"><label for="new_pwd"><?php echo Kohana::lang('user.new_password'); ?> :</label></div>
						<div class="info_stat_user"><input type="password" class="input-text" name="new_pwd" id="new_pwd" /></div>
						<div class="spacer"></div>
						<div class="title_stat_user"><label for="repeat_new_pwd"><?php echo Kohana::lang('user.verif_password'); ?> :</label></div>
						<div class="info_stat_user"><input type="password" class="input-text" name="repeat_new_pwd" id="repeat_new_pwd" /></div>
						<div class="spacer"></div>
						<div class="modif_password"><input type="button" value="<?php echo Kohana::lang('user.modif_password'); ?>" id="modif_pwd" class="button" /></div>
				</div>
				<div class="spacer"></div>
		</div>
		
<?php endif ?>

<div class="panel">
		<div class="content_stat_user">
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_item' ); ?> :</div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_using_item', $stats->nb_using_item ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_using_item; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_shop' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_shop', $stats->nb_shop ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_shop; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_quete' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_quete_valide', $stats->nb_quete_valide ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_quete_valide; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_victory' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_victory_bot_module', $stats->nb_victory_bot_module ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_victory_bot_module; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_bor' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_victory_bot', $stats->nb_victory_bot ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_victory_bot; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_sort' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_sorts', $stats->nb_sorts ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_sorts; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang( 'user.nb_stuff' ); ?> : </div> 
						<div class="badge_stat_user"><?php echo badge::img( 'nb_stuff', $stats->nb_stuff ); ?></div>
						<div class="score_stat_user"><?php echo $stats->nb_stuff; ?></div>
						<div class="spacer"></div>
				</div>
		</div>
</div>

<div class="panel">
		<div class="content_stat_user">
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.id'); ?> : </div>
						<div class="info_stat_user"><?php echo $user->id; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.mail'); ?> : </div>
						<div class="info_stat_user"><?php echo $user->email; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.pseudo'); ?> : </div>
						<div class="info_stat_user"><?php echo $user->username; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.nb_connect'); ?> : </div>
						<div class="info_stat_user"><?php echo $user->logins; ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.last_connect'); ?> : </div>
						<div class="info_stat_user"><?php echo date::FormatDate( date::unix2mysql( $user->last_login ) ); ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.last_action'); ?> : </div>
						<div class="info_stat_user"><?php echo date::FormatDate( date::unix2mysql( $user->last_action ) ); ?></div>
						<div class="spacer"></div>
				</div>
				<div class="row_stat_user">
						<div class="title_stat_user"><?php echo Kohana::lang('user.ip'); ?> : </div>
						<div class="info_stat_user"><?php echo $user->ip; ?></div>
						<div class="spacer"></div>
				</div>
		</div>
		<div class="spacer"></div>
</div>