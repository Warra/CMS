$(document).ready(function(){
    $('#tags').selectize({
        valueField: 'name',
        delimiter: ',',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 5,
        options: [],
        persist:false,
        create: true,
        closeAfterSelect: true,
        render: {
            option: function(item) {
                return '<div>'+(item.name)+'</div>';
            },
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        },
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: '/tagrequest',
                type: 'GET',
                dataType: 'json',
                error: function() {
                    callback();
                },
                success: function(res) {
                    var items = [];
                    callback(res);
                }
            });
        },
        onChange: function(value){
        }
    });
});