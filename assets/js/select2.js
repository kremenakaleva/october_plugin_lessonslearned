$(document).ready(function() {
    $('#classification-dropdown, #transversal_topics-dropdown, #four_m-dropdown, #challenges-dropdown').select2({
       placeholder: 'Select option(s)',
       allowClear: true
    });

    $('#city-dropdown').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
 });
 
