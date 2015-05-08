<?php	defined(	'SYSPATH'	)	OR	die(	'No direct access allowed.'	);	?>

<div class="row_form">
    <label>
        <span class="titreSpanForm">Contenant</span>
    </label>
    <select id="select_id_container" name="id_container" class="input-select">
        <option value="-1" >Nouveau container</option>
        <optgroup label=" -------- " >
            <?php foreach ($containers as $container): ?>
                <option value="<?php echo $container->id; ?>"
                    <?php echo isset($data->id_container) && $data->id_container == $container->id ? 'selected="selected"' : ''; ?>
                        data-container-name="<?php echo $container->name; ?>"
                        data-container-description="<?php echo $container->description; ?>"
                        data-container-allow-put="<?php echo $container->allow_put; ?>"
                        data-container-allow-get="<?php echo $container->allow_get; ?>"
                        data-container-action="<?php echo $container->action; ?>"
                        data-container-spawn-model="<?php echo $container->spawn_model; ?>"
                        data-container-spawn-time="<?php echo $container->spawn_time; ?>"
                        data-container-spawn-max-item="<?php echo $container->spawn_max_item; ?>" >
                    <?php echo $container->id . ' - ' . $container->name; ?>
                </option>
            <?php endforeach ?>
        </optgroup>
    </select>
    <div class="clear"></div>
</div>
<fieldset>
    <legend>Contenant</legend>
    <b id="container_error_b" class="rouge" style="padding-left:10px; display:none;" ></b>
    <br/>
    <div class="row_form">
        <label>
            <span class="titreSpanForm">Nom</span>
            <input id="input_name_container" type="text" name="container_name" class="input-text" placeholder="container name" />
        </label>
    </div>
    <div class="spacer"></div>
    <div class="row_form">
        <label>
            <span class="titreSpanForm">Autoriser à retirer des objets</span>
            <input id="input_allow_get_container" type="checkbox" name="container_allow_get" class="input-checkbox" checked="checked" />
        </label>
        <div class="spacer"></div>
    </div>
    <div class="row_form">
        <label>
            <span class="titreSpanForm">Autoriser à déposer des objets</span>
            <input id="input_allow_put_container" type="checkbox" name="container_allow_put" class="input-checkbox" checked="checked" />
            <div class="spacer">
        </label>
    </div>
    <div class="row_form">
        <label>
            <span class="titreSpanForm">Description</span><br />
            <textarea rows="5" id="input_description_container" name="input_description_container" class="input-textarea" placeholder="Il semblerait qu'il y a quelque chose à l'intérieur. Si vous le souhaitez vous pouvez voir ça de plus près" ></textarea><br />
        </label>
        <div class="spacer">
        </div>


        <div class="row_form">
            <label for="action_container">
                <span class="titreSpanForm">Action</span>
            </label>
            <select id="select_action_container" name="action_container" class="input-select">
                <option value="" >Aucune</option>
                <optgroup label=" -------- " >
                    <option value="spawn">Spawn</option>
                </optgroup>
            </select>
            <div class="spacer"></div>
        </div>

        <fieldset id="container_action_spawn" class="container_action" style="display: none;" >
            <legend>Spawn action</legend>

            <div class="row_form">
                <label>
                    <span class="titreSpanForm">Modèle</span>
                    <select id="select_spawn_model_container" name="spawn_model_container" class="input-select">
                        <option value=""> -- </option>
                        <?php
                        foreach ($containers as $container):
                            if ($container->action === 'model'):
                                ?>
                                <option value="<?php echo $container->id; ?>" >
                                    <?php echo $container->id . ' - ' . $container->name; ?>
                                </option>
                            <?php endif;
                        endforeach ?>
                    </select>
                </label>
                <div class="spacer"></div>
            </div>

            <div class="row_form">
                <label>
                    <span class="titreSpanForm">Temps de Respawn</span>
                    <input type="number" id="input_spawn_time_container" name="spawn_time_container" class="input-number" />
                </label>
                <div class="spacer"></div>
            </div>

            <div class="row_form">
                <label>
                    <span class="titreSpanForm">Nombre d'objets max</span>
                    <input type="number" id="input_spawn_max_item_container" name="spawn_max_item_container" class="input-number" />
                </label>
                <div class="spacer"></div>
            </div>
        </fieldset>


        <div class="clear"></div>
</fieldset>
<script>
    $(function() {

        function setContainerNameInput(select) {
            var option = select.options[select.selectedIndex];

            $('#input_name_container').val(option.getAttribute('data-container-name'));
            $('#input_description_container').val(option.getAttribute('data-container-description'));
            $('#input_allow_get_container').attr('checked', parseInt(option.getAttribute('data-container-allow-get')));
            $('#input_allow_put_container').attr('checked', parseInt(option.getAttribute('data-container-allow-put')));
            $('#select_action_container').val(option.getAttribute('data-container-action'));

            $('#container_action_' + option.getAttribute('data-container-action')).show();

            $('#select_spawn_model_container').val(option.getAttribute('data-container-spawn-model'));
            $('#input_spawn_time_container').val(option.getAttribute('data-container-spawn-time'));
            $('#input_spawn_max_item_container').val(option.getAttribute('data-container-spawn-max-item'));
        }

        setContainerNameInput(document.getElementById('select_id_container'));

        $('#select_id_container').change(function() {
            setContainerNameInput(this);
        });


        $('#enregistrer').click( function(evt) {
            var select = $('#select_id_container');

            var data = {
                id_container: select.val(),
                container_name: $('#input_name_container').val(),
                container_allow_put: $('#input_allow_put_container').attr('checked'),
                container_allow_get: $('#input_allow_get_container').attr('checked'),
                container_description: $('#input_description_container').val(),
                container_action: $('#select_action_container').val(),
                container_spawn_model: $('#select_spawn_model_container').val(),
                container_spawn_time: $('#input_spawn_time_container').val(),
                container_spawn_max_item: $('#input_spawn_max_item_container').val()
            };

            $.ajax({
                url: url_script + 'container/save',
                type: "POST",
                dataType: 'json',
                data: data,
                async: false,
                success: function(result) {
                    if (result.status == 'error') {
                        $('#container_error_b').html(result.message ? 'Erreur:' + result.message : 'Erreur');
                        $('#container_error_b').show();
                    }
                    if (result.status == 'ok' && result.id) {
                        select.append('<option value="' + result.id + '" name="">' + result.id + '</option>');
                        select.val(result.id);
                    } else {
                        evt.stopImmediatePropagation();
                    }
                },
                error: function(_, _2, message) {
                    $('#container_error_b').html(message ? 'Erreur: ' + message : 'Erreur');
                    $('#container_error_b').display();
                    evt.stopImmediatePropagation();
                }
            });
        });


        /* Actions */

        $('#select_action_container').change(function(select) {

            $('fieldset.container_action').hide();
            $('#container_action_' + this.value).show();
        });

    });
</script>
