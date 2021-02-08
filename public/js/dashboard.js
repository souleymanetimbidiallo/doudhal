function ucfirst(chaine){
    if(chaine.length > 0){
        chaine = chaine.charAt(0).toUpperCase() + chaine.substring(1).toLowerCase();
    }
    return chaine;
}

function getDateToday(){
    var maDate = new Date();

    var dms = maDate.getTime();
    var dyear = maDate.getFullYear(); //récupere l'année
    var dmonth = maDate.getMonth(); //récupere le mois (0-11)
    var ddate = maDate.getDate(); //récupere le jour du mois en nombre (1-31)
    var dday = maDate.getDay(); //récupere le jour de la semaine en nombre (0-6)

    var dh = maDate.getHours(); //récupere les heures
    var dmin = maDate.getMinutes(); //récupere les minutes
    var ds = maDate.getSeconds(); //récupere les secondes
    var dmis = maDate.getMilliseconds(); //récupere les millisecondes

    var mois = ['janvier','février', 'mars', 'avril', 'mai', 'juin', 'Juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre'];
    var jour = ['dimanche','lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    return ucfirst(jour[dday])+", "+ddate+" "+ucfirst(mois[dmonth])+" "+dyear;
}

var today = document.getElementById('today');
today.innerHTML = getDateToday();

function openPopup(){
    var width = 500;
    var height = 500;
    if(window.innerWidth){
        var left = (window.innerWidth-width)/2;
        var top = (window.innerHeight-height)/2;
    }
    else{
        var left = (document.body.clientWidth-width)/2;
        var top = (document.body.clientHeight-height)/2;
    }
    window.open('http://soodou-shop.zd.fr/soodafwe-ventes.sql',
        'Ma popup',
        'menubar=no, scrollbars=no,'+ 
        'top='+top+', left='+left+', width='+width+', height='+height+'');
}