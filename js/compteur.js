

function display_timer(date, target_id) {

    setInterval(function() {
	now = Date.now();
	
	total_seconds = (date - Date.now()) / 1000;
	
	days = Math.floor(total_seconds / (3600 * 24));
	hour = Math.floor((total_seconds % (3600 * 24) / 3600));
	minutes = Math.floor((total_seconds % 3600) / 60);
	seconds = Math.floor(total_seconds % 60);
	
	result = days + 'd ' + hour + 'h ' + minutes + 'm ' + seconds + 's';
    target = document.getElementById(target_id);
    if (target)
        target.innerHTML = result;
    }, 1000);
}



display_timer(new Date(2014, 11, 24), 'mon-compteur');
