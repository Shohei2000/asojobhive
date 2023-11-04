$(document).ready(function() {
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/autocomplete",
                method: "GET",
                data: { keyword: request.term },
                success: function(data) {
                    response(data);
                }
            });
        }
    });
});