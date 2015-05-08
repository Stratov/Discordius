var focusChat = false;

$(function(){
		
		var history = localStorage.getItem('tchat');
				
		try {
				if (history)
				{
						$('#slide-chat').html(history).children().fadeIn(600);
						$('#tchat').scrollTop($('#slide-chat').height());
				}
		} catch( ex ) {
				log('Impossible d\'afficher l\'historique du tchat (navigateur incorect) : '+ex.toString());
		}
});

function insert_tchat_socket( txt, id, username )
{
		show_tip('<b>' + HTMLentities(username) + ' :</b> ' + HTMLentities(txt), '#otherUser-' + id );
}

function send_tchat()
{
		if( MySocket == false)
		{
				crea_socket();
				return;
		}

		var txt = $('#msgTchat').val();

		$('#msgTchat').val('');

		if( !txt || txt.substr(1, user_username.length) == user_username)
				return;

    if (execute_special_commands(txt))
        return;

    var data = {
				type : 'tchat',
				id_user : id_user,
				id_region : id_region,
				avatar : user_avatar,
				username : user_username,
				txt : txt
		};

		send_socket(data);
		show_tip('<b>'+ HTMLentities(user_username) +' : </b>'+HTMLentities(txt), '#myUser' );
}


/**
 *          WIP
 *
 * @param msg text submitted to the chat prompt.
 * @return {boolean} True if a command has been executed; Otherwise false.
 */
function execute_special_commands(msg)
{
    if (/^\/teleport(\s.*)?$/.test(msg) ||
            /^\/tp(\s.*)?$/.test(msg)) {
        var args = msg.split(/\s+/);
        if (/\s+/.test(args[args.length]))
            args.pop();
        if (args.length != 3) {
            show_tip('<i style="color: #ff0000" ><b>System: Error: </b>/teleport take 2 arguments.</i>', '#myUser');
        } else {
            $.post(url_script + 'user/teleport', {
                x: args[1],
                y: args[2]
            }).success(function(response) {
                send_info_socket('teleport', response.x, response.y);

                var user = $('#myUser');
                var tablemap = $('#tableMap');

                //Note about user transportation:
                //His position is fixed with css properties 'left' and 'top'.
                //It's relative to the map, and the "view" map can have a non-zero position.
                //The map doesn't automatically move to the follow the player.
                user.css('left', (size_case * response.x + position('#tableMap', 'left')) + 'px');
                user.css('top', (size_case * response.y + position('#tableMap', 'top')) + 'px');
                positionUser(); //Display the position on right top of the map.

                if (position('#myUser', 'left') < size_case) {
                    tablemap.css('left', (position('#tableMap', 'left') - position('#myUser', 'left') + size_case) + 'px');
                    user.css('left', size_case);
                }
                if (position('#myUser', 'left') + 2 * size_case > widthContener) {
                    tablemap.css('left', (position('#tableMap', 'left') + position('#myUser', 'left')
                        - widthContener - 2 * size_case) + 'px');
                    user.css('left', (widthContener - 2 * size_case) + 'px');
                }
                if (position('#myUser', 'top') + 2 * size_case > heightContener) {
                    tablemap.css('top', (position('#tableMap', 'top') - position('#myUser', 'top')
                        - heightContener - 2 * size_case) + 'px');
                    user.css('top', (widthContener - 2 * size_case) + 'px');
                }
                if (position('#myUser', 'top') < size_case) {
                    tablemap.css('top', (position('#tableMap', 'top') - position('#myUser', 'top') + size_case) + 'px');
                    user.css('top', size_case);
                }

                show_tip('<i style="color: green" ><b>System: Command sent.</i>', '#myUser');
            }).fail(function(response) {
                show_tip('<i style="color: #ff0000" ><b>System: Command failed ('
                + response.status + '): ' + HTMLentities(response.responseText) +'</i>', '#myUser');
            });
        }
        return true;
    }
    return false;
}


function show_tip( txt, div_id ) 
{
		if( !$(div_id).length )
				return;

        txt = txt.replace(':ambulance:', '<img width="65", height="31" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/01.gif"/>');
		txt = txt.replace(':ange:', '<img width="27", height="26" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/02.gif"/>');
		txt = txt.replace(':jaune:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/03.gif"/>');
		txt = txt.replace(':rouge:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/04.gif"/>');
		txt = txt.replace(':malade:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/05.gif"/>');
		txt = txt.replace(':cartonrouge:', '<img width="44", height="32" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/06.gif"/>');
		txt = txt.replace(':boude:', '<img width="28", height="28" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/07.gif"/>');
		txt = txt.replace(':d', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/08.gif"/>');
		txt = txt.replace(':rire:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/08.gif"/>');
		txt = txt.replace(':surpris:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/09.gif"/>');
		txt = txt.replace(':surpris:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/10.gif"/>');
		txt = txt.replace(':moustache:', '<img width="29", height="25" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/11.gif"/>');
		txt = txt.replace(':salut:', '<img width="26", height="18" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/12.gif"/>');
		txt = txt.replace(':bravo:', '<img width="40", height="24" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/13.gif"/>');
		txt = txt.replace(':dors:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/14.gif"/>');
		txt = txt.replace(':classe:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/16.gif"/>');
		txt = txt.replace(':snif:', '<img width="31", height="22" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/17.gif"/>');
		txt = txt.replace(':Diable:', '<img width="37", height="31" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/20.gif"/>');
		txt = txt.replace(':confus:', '<img width="30", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/21.gif"/>');
		txt = txt.replace(':fumeur:', '<img width="33", height="28" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/22.gif"/>');
		txt = txt.replace(':ignore:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/26.gif"/>');
		txt = txt.replace(':gg:', '<img width="26", height="23" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/27.gif"/>');
		txt = txt.replace(':moqueur:', '<img width="28", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/29.gif"/>');
		txt = txt.replace(':sos:', '<img width="29", height="33" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/31.gif"/>');
		txt = txt.replace(':hein:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/32.gif"/>');
		txt = txt.replace(':rois:', '<img width="28", height="28" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/33.gif"/>');
		txt = txt.replace(':mignone:', '<img width="30", height="21" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/34.gif"/>');
		txt = txt.replace(':non:', '<img width="25", height="25" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/41.gif"/>');
		txt = txt.replace(':la:', '<img width="24", height="21" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/42.gif"/>');
		txt = txt.replace(':micro:', '<img width="30", height="28" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/48.gif"/>');
		txt = txt.replace(':)', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/50.gif"/>');
		txt = txt.replace(':regle:', '<img width="26", height="26" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/51.gif"/>');
		txt = txt.replace(':lapin:', '<img width="38", height="25" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/55.gif"/>');
		txt = txt.replace(':chut:', '<img width="22", height="25" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/56.gif"/>');
		txt = txt.replace(':oua:', '<img width="20", height="20" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/57.gif"/>');
		txt = txt.replace(':triste:', '<img width="24", height="22" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/63.gif"/>');
		txt = txt.replace(':cartonjaune:', '<img width="41", height="31" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/71.gif"/>');
		txt = txt.replace(':yoyo:', '<img width="30", height="24" src="http://www.paranoland.com/emoticones-smileys/smileys/forum/74.gif"/>');
		
		
		$('#slide-chat').append('<p>'+txt+'</p>').children().last().fadeIn(600);
		$('#tchat').scrollTop($('#slide-chat').height());
				
		try {
				localStorage.clear();
				localStorage.setItem('tchat', $('#slide-chat').html());
		} catch( ex ) {
				log('Impossible de sauvegarder le tchat (navigateur incorect) : '+ex.toString());
		}

		var tip = $('<div/>', {
				html: txt,
				'class': 'tip_map_tchat'
		}).prependTo( div_id ==  '#myUser' ? '#map' : '#tableMap').hide();

		var position = $(div_id).position(),
		top = Math.round( position.top - 30 ),
		left = Math.round( position.left - ( Math.round( tip.outerWidth() - size_character_x ) / 2 ) ),
		x_map = $('#mapContener').width();

		var class_css = {
				'position' : 'absolute',
				'z-index' : '8',
				'text-align' : 'center'
		};

		if( top < 0)
				class_css.top = '0px';
		else
				class_css.top = top+'px';

		if( left < 0)
				class_css.left = '0px';
		else if( ( tip.outerWidth() + position.left + size_character_x ) > x_map)
				class_css.right = '0px';
		else
				class_css.left = left+'px';

		tip.css(class_css).show().delay(3000).animate({
				top : '-=40'
		}, 5000 ).animate({
				opacity : 0, 
				top : '-=20'
		}, 2000, function() {
				$(this).remove();
		});
}