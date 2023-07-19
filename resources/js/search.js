//オートコンプリート機能
$(document).ready(function() {
    $("#searchInput").on("input", function() {
        var keyword = $(this).val();
        
        $.ajax({
            url: "/autocomplete",
            method: "GET",
            data: { keyword: keyword },
            success: function(response) {
                // レスポンスの処理
                console.log(response);
            }
        });
    });
});