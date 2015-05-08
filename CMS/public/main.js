$(document).ready(function(){
    $('#tags').selectize({
        valueField: 'name',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 10,
        options: [],
        create: false,
        render: {
            option: function(item) {
                return '<div>'+(item.name)+'</div>';
            }
        },
        // optgroups: [
        //     {value: 'product', label: 'Products'},
        //     {value: 'category', label: 'Categories'}
        // ],
        // optgroupField: 'class',
        // optgroupOrder: ['product','category'],
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
                    // console.log(res[0].name);
                    // callback(res.data);
                    callback(res[0].name);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
});