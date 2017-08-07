(function () {
    var padded_string = function (target_str, pad_str, length) {
        var origin = target_str + '';
        
        if (origin.length < length) {
            var iter = length - origin.length
            
            while (iter--) {
                origin = (pad_str + '') + origin;
            }
        }
        
        return origin;
    };
    
    var update_times = function (offset) {
        $('.d-time').each(function (i, el) {
            var time_el = $(el);
            
            if (!time_el.text().trim()) {
                return;
            }
            
            var components = time_el.text().trim().split(':');
            var hour = parseInt(components[0]);
            var minute = parseInt(components[1]);
            
            var original_data = time_el.data('origin');
            var timestamp;
            
            if (!original_data) {
                time_el.data('origin', (function () {
                    timestamp = new Date(0, 0, 0, hour-1, minute, 0, 0);
                    return (timestamp).getTime();
                })());
            } else {
                timestamp = new Date(parseInt(original_data));
            }
            
            timestamp.setHours(timestamp.getHours() + offset);

            time_el.text(
                padded_string(timestamp.getHours(), 0, 2) + 
                ':' +
                padded_string(timestamp.getMinutes(), 0, 2)
            );
        });
    };
    
    
    $('.controls').first().find('a').each(function (i, el) {
        var control_el = $(el);
        var offset = parseInt(control_el.data('offset'));
        
        control_el.click(function () {
            update_times(offset);
        });
    });
})();
