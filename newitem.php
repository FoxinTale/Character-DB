<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title>New Item</title>
       <!--
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/w3-min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        -->
    </head>
    <body>
        <div class="box light-purple container2 shadow-816">
            <h3 class="display-header">New Item</h3>
            <form id="newitem" class="align">
                <div class="tooltip" title="The name of the item, obviously.">
                    <label for="itemname" id="itemnamelabel">Item Name: </label>
                    <input type="text" class="textinput" id="itemname" name="item_name"><span class = "error" ></span>
                    <input type="hidden" id="item_name" value="">
                    <br>
                </div>

                <div class="tooltip" title="A short description of the item.">
                    <label for="itemdesc">Item Description: </label>
                    <textarea required id="itemdesc" name="item_desc" class='textbox'></textarea><span class = "error" ></span>
                    <input type="hidden" id="item_desc" value="">
                    <br>
                </div>

                <div class="tooltip" title="The appearance of the item.">
                    <label for="itemappear">Item Appearance: </label>
                    <textarea id="itemappear" name="item_appear" class='textbox'></textarea><span class = "error" ></span>
                    <input type="hidden" id="item_appear" value="">
                    <br>
                </div>

                <div class="tooltip" title="The type or class of the item. Magical, tool, or otherwise.">
                    <label for="itemtype">Item Type: </label>
                    <input type="text" class="textinput" id="itemtype" name="item_type"><span class = "error" ></span>
                    <input type="hidden" id="item_type" value="">
                    <br>
                </div>

                <div class="tooltip" title="This is the size of the item. Can be in relation to character. If units, please list the units.">
                    <label for="itemsize">Item Size: </label>
                    <input type="text" class="textinput" id="itemsize" name="item_size"><span class = "error" ></span>
                    <input type="hidden" id="item_size" value="">
                    <br>
                </div>

                <div class="tooltip" title="Where the item can go on the character. Is it headwear, a ring, a necklace, held in the hand?...">
                    <label for="itemloc">Item Location: </label>
                    <input type="text" class="textinput" id="itemloc" name="item_loc"><span class = "error" ></span>
                    <input type="hidden" id="item_loc" value="">
                    <br>
                </div>

                <div class="tooltip" title="Any effects the item has. On the user and/or area...">
                    <label for="itemeffect">Item Effects: </label>
                    <textarea id="itemeffect" name="item_effect" class='textbox'></textarea><span class = "error" ></span>
                    <input type="hidden" id="item_effect" value="">
                    <br>
                </div>

                <div class="tooltip" title="Any conditions that have to be met for the item to be used.">
                    <label for="itemcond">Item Conditions: </label>
                    <textarea id="itemcond" name="item_cond" class='textbox'></textarea><span class = "error" ></span>
                    <input type="hidden" id="item_cond" value="">
                    <br>
                </div>

                <div class="tooltip" title="The value of the item. This area is not required, but can be used if so desired.">
                    <label for="itemvalue">Item Value: </label>
                    <input type="text" class="textinput" id="itemvale" name="item_value"><span class = "error" ></span>
                    <input type="hidden" id="item_value" value="">
                    <br>
                </div>
                <!-- 
                Image upload area.
                -->
                <input type="submit" class="data-entry" id="item_button" value="Add Item!">   
            </form>
        <script type="text/javascript">
            $('.textbox').on('input', function () {
                this.style.height = 'auto';

                this.style.height = 
                        (this.scrollHeight) + 'px';
            });
        </script>
    </div>
</body>
