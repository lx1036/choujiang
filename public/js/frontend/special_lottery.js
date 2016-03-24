/**
 * Created by 李朋飞 on 2016/2/17.
 */
!(function($){
    li_data = new Array();
    cur_data = new Array();
    winner = new Array();
    is_start = false;

    lottery_last_count = parseInt($("#lottery_last_count").text());

    interval_idx = 0;
    function show_data(){
        max_show_count = 7;
        var lottery_list = '';
        if (cur_data.length == 0){
            while(cur_data.length < max_show_count && cur_data.length != li_data.length){
                var tmp = li_data[rand(li_data.length - 1)];

                var in_array = false;
                for (var i = 0; i < cur_data.length; i++){
                    if (cur_data[i].number == tmp.number){
                        in_array = true;
                        break;
                    }
                }
                if (in_array == false){
                    cur_data.push(tmp);
                }
            }
        }else{
            if (li_data.length > max_show_count){
                cur_data.shift();
                while(cur_data.length < max_show_count){
                    var tmp = li_data[rand(li_data.length - 1)];
                    var in_array = false;
                    for (var i = 0; i < cur_data.length; i++){
                        if (cur_data[i].number == tmp.number){
                            in_array = true;
                            break;
                        }
                    }
                    if (in_array == false){
                        cur_data.push(tmp);
                    }
                }
            }
        }
        var lottery_list = '';
        for(var i = 0; i < max_show_count && i < cur_data.length; i++){
            $("#lottery_list > li:eq(" + i + ")").attr({
                number: cur_data[i].number,
                department: cur_data[i].department}).text(cur_data[i].name);
        }
    }
    function rand(y){
        x = 0;
        return parseInt(Math.random()*(y - x + 1) + x);
    }

    begin_lottery = function (){
        if (is_start == true) {
            end_lottery();
            return;
        }
        $("#lottery_list > li:eq(7) > a > img").attr("src", '/images/stop.jpg');
        is_start = true;
        if (lottery_last_count <= 0){ return ; }
        var url = '/employee';
        $.getJSON(url, function(data){
            li_data = data;
            show_data();
            interval_idx = setInterval(show_data,100);
        });
    }

    end_lottery = function(){
        $("#lottery_list > li:eq(7) > a > img").attr("src", '/images/cj_btn.jpg');
        is_start = false;
        clearInterval(interval_idx);
        update_winner_list();
    }

    // +++++
    $(document).on("click","#end_lottery", function(){
        $("#begin_lottery").show();
        $("#end_lottery").hide();
        clearInterval(interval_idx);
        update_winner_list();
    });
    // +++++
    //
    //=======
    function update_winner_list(){
        var t = {
            "numbers":$("#lottery_list > li:eq(3)").attr("number"),
            "name":$("#lottery_list > li:eq(3)").text()
        }
        $.post("/employee/setwinner?numbers=" + t.numbers);
    }

    //=======
    var url = '/employee';
    $.getJSON(url, function(data){
        li_data = data;
        show_data();
    });
})(window.jQuery);
