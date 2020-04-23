var $ = function (id) {
    return document.getElementById(id);
};

function fillblankschar() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['charalias', $('charalias').value.trim()],
            ['charstatus', $('charstatus').value.trim()],
            ['charsoul', $('charsoul').value.trim()],
            ['charother', $('charother').value.trim()]
        ];
        filling(data);
    }
};

function fillblankspers() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['charact', $('charact').value.trim()],
            ['charagree', $('charagree').value.trim()],
            ['charassert', $('charassert').value.trim()],
            ['charconf', $('charconf').value.trim()],
            ['chardisc', $('chardisc').value.trim()],
            ['charemocap'], $('charemocap').value.trim(),
            ['charfriend', $('charfriend').value.trim()],
            ['charhonest', $('charhonest').value.trim()],
            ['charintel', $('charintel').value.trim()],
            ['charmanners', $('charmanners').value.trim()],
            ['charpos', $('charpos').value.trim()],
            ['charrebel', $('charrebel').value.trim()],
            ['charpersdesc', $('charpersdesc').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksappear() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['charears', $('charears').value.trim()],
            ['charskin', $('charskin').value.trim()],
            ['charunique', $('charunique').value.trim()],
            ['charadd', $('charadd').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksoutfit() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [

        ];
        filling(data);
    }
};

function fillblanksrace() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['racename', $('racename').value.trim()],
            ['racehome', $('racehome').value.trim()],
            ['raceage', $('raceage').value.trim()],
            ['racesize', $('racesize').value.trim()],
            ['racetraits', $('racetraits').value.trim()],
            ['racedesc', $('racedesc').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksstats() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['stathealth', $('stathealth').value.trim()],
            ['statstam', $('statstam').value.trim()],
            ['statmana', $('statmana').value.trim()],
            ['statlevel', $('statlevel').value.trim()],
            ['statexp', $('statexp').value.trim()],
            ['statagile', $('statagile').value.trim()],
            ['statstrong', $('statstrong').value.trim()],
            ['statchar', $('statchar').value.trim()],
            ['statpercep', $('statpercep').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksother() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['othertheme',$('othertheme').value.trim()],
            ['otherquotes', $('otherquotes').value.trim()],
            ['otherquirks', $('otherquirks').value.trim()],
            ['otherquirksdesc', $('otherquirksdesc').value.trim()],
            ['otherweak', $('otherweak').value.trim()],
            ['otherbackstory', $('otherbackstory').value.trim()],
            ['otherbday', $('otherbday').value.trim()],
            ['otherzodiac', $('otherzodiac').value.trim()],
            ['otherhobbies', $('otherhobbies').value.trim()],
            ['otherother', $('otherother').value.trim()]
            
        ];
        filling(data);
    }
};

function fillblanksweap() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['weapsize', $('weapsize').value.trim()],
            ['weaphand', $('weaphand').value.trim()],
            ['weapeffect', $('weapeffect').value.trim()],
            ['weapcond', $('weapcond').value.trim()],
            ['weapvalue', $('weapvalue').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksitem() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['itemsize', $('itemsize').value.trim()],
            ['itemloc', $('itemloc').value.trim()],
            ['itemeffect', $('itemeffect').value.trim()],
            ['itemcond', $('itemcond').value.trim()],
            ['itemvalue', $('itemvalue').value.trim()]
        ];
        filling(data);
    }
};

function fillblanksspell() {
    var fillblanks = $('fillit').checked;
    if (fillblanks === true) {
        var data = [
            ['spelldesc2', $('spelldesc2').value.trim()],
            ['spellschool', $('spellschool').value.trim()],
            ['spellrange', $('spellrange').value.trim()],
            ['spellduration', $('spellduration').value.trim()],
            ['spellcast', $('spellcast').value.trim()],
            ['spelldmg', $('spelldmg').value.trim()],
            ['spelllevel', $('spelllevel').value.trim()],
            ['spellmats', $('spellmats').value.trim()],
            ['spellrit', $('spellrit').value.trim()],
            ['spelltags', $('spelltags').value.trim()]
        ];
        filling(data);
    }
};

function filling(array) {
    for (var i = 0; i < array.length; i++) {
        var temp = array[i];
        if (temp[1] === "" || null) {
            $(temp[0]).value = "N/A";
        }
    }
};