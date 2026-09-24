import './bootstrap';
import 'preline';
import 'preline/dist/preline.js';

import $ from 'jquery';
import 'jquery-ui/ui/widgets/datepicker';
import Swiper from 'swiper/bundle';

$(document).ajaxSend(function(e, xhr, options) {
    var token = $('meta[name="csrf-token"]').attr('content');
    if (token) {
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
    }
});