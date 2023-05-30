
    var loadFlag = 0;
    loadMore(loadFlag);

    function loadMore(start) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var result = xhr.responseText;
          document.getElementById('menu-cards').innerHTML += result;
          loadFlag += 4;
        }
      };
      xhr.open('GET', 'action/getMenu.php?start=' + start, true);
      xhr.send();
    }
    window.addEventListener('DOMContentLoaded', function () {
      window.addEventListener('scroll', function () {
        if (window.pageYOffset >= document.documentElement.scrollHeight - (window.innerHeight)) {
          loadMore(loadFlag);
          console.log("Called " + loadFlag);
        }
      });
    });

   
    function addtocart(id) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "action/addtocart.php?foodID=" + id);
      xhr.onload = function () {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          const count = xhr.responseText;
          document.getElementById("cart-count").innerHTML = "000";
          document.getElementById("cart-count").innerHTML = count.toString();
        }
      };
      xhr.send();
    }


    function fetchData() {
      // Code for the method you want to execute
      notification()
    }
    setInterval(fetchData, 10000);
    $(document).ready(function () {
      $('#search').on('input', function () {
        var search = $(this).val();

        $.ajax({
          url: 'action/search.php',
          method: 'POST',
          data: { search: search },
          success: function (response) {
            // Update the DOM with the search results
            $('#menu-cards').html(response);
          }
        });
      });
    });
    
    
