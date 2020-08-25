$('#add_new_unit').click(function() {
    alert(numeral(10000).format('$0,0.00'));
});
var time = moment('2020-08-14').format('yyyy-MM-DD');

$('#time').html(process.env.MIX_APP_NAME);


