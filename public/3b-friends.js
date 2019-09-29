var fr = {
  list : function () {
  // list() : show list of users

    // AJAX data
    var data = new FormData();
    data.append('req', 'show-users');

    // AJAX call
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "2c-ajax-friends.php", true);
    xhr.onload = function(){
      document.getElementById("user-list").innerHTML = this.response;
    };
    xhr.send(data);
  },

  process : function (id, req) {
  // process() : process friend request
  // PARAM id : target user ID
  //       req : AJAX request

    // AJAX data
    var data = new FormData();
    data.append('req', req);
    data.append('user_id', id);

    // AJAX call
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "2c-ajax-friends.php", true);
    xhr.onload = function(){
      var res = JSON.parse(this.response);
      if (res.status==1) {
        fr.list();
      } else {
        alert(res.msg);
      }
    };
    xhr.send(data);
  }
};

window.addEventListener("load", fr.list);