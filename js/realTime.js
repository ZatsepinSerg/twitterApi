function lastResult() {
    $.ajax({
        type: 'GET',
        url: "ajax.php?action=searchNewPost",
        cache: false,
        success: function (responce) {
            var
                newTwitt = JSON.parse(responce),
                countNewTwitt = newTwitt.length,
                counter = (countTwits + countNewTwitt);
            console.log(newTwitt);
            if (newTwitt.length) {
                var blocTwitt = '';

                for (variable in newTwitt) {
                    console.log(newTwitt[variable][1]);
                    blocTwitt = '<div class="col-sm-10 twitter">' +
                        '<div id="tb-testimonial" class="testimonial testimonial-default">' +
                        '<div class="testimonial-section">' + newTwitt[variable][0] +
                        '</div><div class="testimonial-desc"><img src=" ' + newTwitt[variable][3] + '" alt="' +
                        '" /><div class="testimonial-writer"><div class="testimonial-writer-name">' + newTwitt[variable][2] +
                        '</div><div class="testimonial-writer-name">Date by: ' + newTwitt[variable][1] + '</div><div class="testimonial-writer-designation">' +
                        ' </div></div></div></div></div> ';

                    $("#twitts").prepend(blocTwitt);
                   var countTwits = $('.twitter').length;
                    if (countTwits > 25) {
                        $(".twitter").last().remove();
                    }
                }
            }
        }
    });
}

$(document).ready(function () {
    setInterval('lastResult()', 100000);

});

