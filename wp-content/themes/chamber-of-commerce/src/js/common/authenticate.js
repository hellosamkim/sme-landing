(function(){
  if (sessionStorage.getItem('username')) {
    $('#user_login').val(sessionStorage.getItem('username'))
  }
  $('#loginform').on('submit',function(e) {
    sessionStorage.setItem('username',$('#user_login').val())
  })
})()