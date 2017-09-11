$(document).ready(function () {

    var scrollTime = 2000;
    var scrollBackTime = 5000;

    //Hide the alert element
    $('#newTime').hide();

    //Save having to type the : all the time
    var input = $('input#time');
    input.on('keyup' , function (evt) {

        time = input.val();

        //If the key is not a number then drop it.
        if (evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
            time = time.substring(0, time.length - 1);
            input.val(time)
        }
        
        //Carry on and add in the colon
        if ( time.length === 3 ){

            input.val( time + ':' );
        }

        if ( time.length === 7 ){
            time = time.substring(0, time.length - 1);
            input.val(time)
        }

    });

    //Only run this chunk on the add times page
    if ($('table#add-times').length > 0) {

        $('html, body').animate({
            scrollTop: $("tr.latest").offset().top
        }, scrollTime, function () {
            setTimeout(ScrollBack( $(document).height() ), scrollBackTime);
        });

    }




    if ( $('#leaderboard').length > 0 ){
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('0411e30c5fbab3011642', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {

            var i = '1';

            var template = "" +
                "<tr id=\"time_{{ id }}\">\n" +
                " <td># {{ no }}</td>\n" +
                " <td>{{ firstname }}</td>\n" +
                " <td>{{ surname }}</td>\n" +
                " <td>{{ time }}</td>\n" +
                " </tr>";

            var output = '';
            var html = '';

            $.each( data.times, function( key, row  ) {
                var firstname = row.runner.firstname;
                var surname = row.runner.surname;
                var time = row.time;

                output = template.replace('{{ id }}' , row.id );
                output = output.replace('{{ no }}' , i );
                output = output.replace('{{ firstname }}' , firstname );
                output = output.replace('{{ surname }}' , surname );
                output = output.replace('{{ time }}' , time );

                html += output;
                i++;
            });

            //Push the data to the table. Yay.
            $('#leaderboard tbody').html( html );

            //Now highlight the element.
            newElement =  $('tr#time_' + data.id);
            newElement.addClass('latest');
            scrollToIt( newElement , 0 );

            $('#newTime').fadeIn(500).delay(5000).fadeOut(500);

        });
    }

    function scrollToIt( element , scrollTo){
        
        $('html, body').animate({
            // scrollTop: $("tr.latest").offset().top
            scrollTop: element.offset().top
        }, scrollTime, function () {
            setTimeout(ScrollBack( scrollTo ), scrollBackTime);
        });

    }


    function ScrollBack( scrollTo ) {
        $("html, body").animate({scrollTop: scrollTo}, scrollTime);
    }

















    


});