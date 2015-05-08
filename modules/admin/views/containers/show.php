<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>
<article class="module width_full relative">
    <header>
        <h3 class="tabs_involved"><?php echo $row ? $row->name : 'Nouveau conteneur'; ?></h3>
    </header>
    <div class="module_content">
        <p class="form-line">
            <label for="name" class="form-label">Nom :</label>
            <input name="name" id="name" value="<?php echo $row ? $row->name : 'Nouveau conteneur'; ?>" class="inputbox input-text" type="text" maxlength="150" />
        </p>
        <p class="form-line">
            <label for="action" class="form-label">Action : </label>
            <select name="action" id="action" class="selectbox input-select" >
                <option> - </option>
                <optgroup label="------------" >
                    <option <?php if ($row && $row->action == 'model'): ?>selected="selected"<?php endif ?> >model</option>
                    <option <?php if ($row && $row->action == 'spawn'): ?>selected="selected"<?php endif ?> >spawn</option>
                </optgroup>
            </select>
        </p>
        <p class="form-line">
            <label for="allow_put" class="form-label">Possibilité de déposer les objets :</label>
            <select name="allow_put" id="allow_put" class="selectbox input-select" >
                <option value="1" <?php if ($row && $row->allow_put): ?>selected="selected"<?php endif ?> >Oui</option>
                <option <?php if ($row && !$row->allow_put): ?>selected="selected"<?php endif ?> value="0">Non</option>
            </select>
        </p>
        <p class="form-line">
            <label for="allow_get" class="form-label">Possibilité de retirer les objets :</label>
            <select name="allow_get" id="allow_get" class="selectbox input-select" >
                <option value="1" <?php if ($row && $row->allow_get): ?>selected="selected"<?php endif ?> >Oui</option>
                <option <?php if ($row && !$row->allow_get): ?>selected="selected"<?php endif ?> value="0">Non</option>
            </select>
        </p>
        <p class="form-line">
            <label for="description" class="form-label">Description : </label>
            <textarea name="description" id="description" class="inputbox input-textarea" style="height: 100px;" ><?php echo $row ? $row->description : '' ?></textarea>
        </p>
    </div>
</article>


<article class="module width_half relative">
    <header>
        <h3 class="tabs_involved">Objet(s) présent(s) dans le conteneur</h3>
    </header>
    <div id="container_content" class="module_content" >
        <?php if ((is_array($list_items) && !count($list_items)) || !$list_items->count()): ?>
            Le conteneur est vide.
        <?php endif ?>
        <?php foreach ($list_items as $key => $row): ?>
            <div class="container_row">
                <div class="object_image" >
                    <img src="<?php echo url::base(); ?>../images/items/<?php echo $row->image; ?>" width="24" height="24" />
                </div>
                <div class="object_description" >
                    <h4>
                        <?php echo $row->name; ?>
                    </h4>
                    <p><?php echo $row->comment; ?></p>
                </div>
                <div class="object_quantity" >
                    <select name="items[<?php echo $row->id; ?>]" class="inputbox" disabled="disabled"  >
                        <?php for ($i = 0; $i < 100; $i++): ?>
                            <option <?php echo $i == $row->nbr ? 'selected="selected"' : '' ?> ><?php echo $i ?></option>
                        <?php endfor ?>
                    </select>
                    <button data-object-id="<?php echo $row->id; ?>" class="button vert object_rm_btn">Supprimer</button>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</article>

<article class="module width_half relative">
    <header>
        <h3 class="tabs_involved">Objets disponibles</h3>
    </header>
    <div class="module_content" >
        <div id="search_objects" class="form-line" >
            <label class="form-label" for="search_objects_input">Recherche :</label>
            <input id="search_objects_input" class="inputbox" type="text" />
        </div>
        <div id="objects_list" >
        </div>
    </div>
</article>
<div class="spacer"></div>


<script>
    //Search for items
    $('#search_objects_input').bind('input', function() {
        var val = $(this).val();

        if (val.length < 3)
            return;

        $.ajax({
            url: url_script + 'containers/search_objects/' + encodeURI(val),
            dataType: 'text json',
            success: function(data) {
                var list_tag = $('#objects_list');

                list_tag.empty();

                for (var i = 0; i < data.items.length; i++) {
                    var row = data.items[i];

                    var str = '<div class="container_row"><div class="object_image" >' +
                        '<img src="<?php echo url::base(); ?>../images/items/' + row.image + '" width="24" height="24" />' +
                        '</div><div class="object_description" ><h4>' + row.name + '</h4>' +
                        '<p>' + row.description + '</p></div><div class="object_add" >' +
                        '<button data-object-id="' + row.id +
                        '" class="button vert object_add_btn" >Ajouter</button></div></div>';
                    list_tag.append(str);
                }
            }
        });


    });


    function update_container_content(items) {
        console.log(items);
        var container = $('#container_content');
        container.empty();
        for (var i = 0; i < items.length; i++) {
            var str = 'E';

            var str = '<div class="container_row"><div class="object_image" >' +
                '<img src="<?php echo url::base(); ?>../images/items/' + items[i].image + '" width="24" height="24" />' +
                '</div><div class="object_description" ><h4>' + items[i].name + '</h4>' +
                '<p>' + items[i].description + '</p></div><div class="object_quantity" >' +
                '<select disabled="disabled" name="items[' + items[i].id + ']" class="inputbox" >';
            //for (var j = 0; j < 100; j++) {
            var j = items[i].nbr;
            str += '<option ' + (items[i].nbr == j ? 'selected="selected"' : '') + '>' + j + '</option>';
            //}
            str += '</select>';
            str += '<button data-object-id="' + items[i].id +
                '" class="button vert object_rm_btn" >Supprimer</button>';
            str += '</div></div>';

            container.append(str);
        }
    }

    //Add item
    $('#objects_list').delegate('.object_add_btn', 'click', function() {
        var item = this.getAttribute('data-object-id');
        var btn = this;

        $.ajax({
            url: url_script + 'containers/add_item/<?php echo $id; ?>',
            dataType: 'text json',
            type: 'POST',
            data: { id: item },
            success: function(data) {
                if(data.status == 'OK') {
                    update_container_content(data.items);
                } else {
                    console.log(data);
                }
            }
        });
    });

    //rm item
    $('#container_content').delegate('.object_rm_btn', 'click', function() {
        var item = this.getAttribute('data-object-id');
        var btn = this;

        $.ajax({
            url: url_script + 'containers/rm_item/<?php echo $id; ?>',
            dataType: 'text json',
            type: 'POST',
            data: { id: item },
            success: function(data) {
                if(data.status == 'OK') {
                    update_container_content(data.items);
                } else {
                    console.log(data);
                }
            }
        });
    });


    function action_behavior() {
        if (this.value === 'model') {
            $('#allow_get,#allow_put')
                .css('color', 'grey')
                .attr('disabled', true)
                .val('0');
        } else {
            $('#allow_get,#allow_put')
                .css('color', '')
                .attr('disabled', false);
        }
    }

    $('#action').change(action_behavior);
    action_behavior.call(document.getElementById('action'));

</script>
