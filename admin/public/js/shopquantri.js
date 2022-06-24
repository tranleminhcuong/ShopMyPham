$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
  });

  //hiện ẩn mật khẩu
$(document).ready(function(){
  // Click event of the showPassword button
  $('#showPassword').on('click', function(){
    // Get the password field
    var matkhau = $('#matkhau');
    var xacnhanmatkhau=$('#xacnhanmatkhau')
    // Get the current type of the password field will be password or text
    var passwordFieldType = matkhau.attr('type');
    var checkpasswordFieldType = xacnhanmatkhau.attr('type');
    // Check to see if the type is a password field
    if(passwordFieldType == 'password' && checkpasswordFieldType=='password' )
    {
      // Change the password field to text
      matkhau.attr('type', 'text');
      xacnhanmatkhau.attr('type', 'text');
      // Change the Text on the show password button to Hide
     
    } else {
      // If the password field type is not a password field then set it to password
      matkhau.attr('type', 'password');
      xacnhanmatkhau.attr('type', 'password');
      // Change the value of the show password button to Show
     
    }
  });
});

function ktxacnhanmatkhau() {
  var matkhau = document.getElementById("matkhau").value;
  var xacnhanmatkhau = document.getElementById("xacnhanmatkhau").value;
  if (matkhau == xacnhanmatkhau) {
    return true;
  } else {
    alert("Xác nhận mật khẩu thất bại!");
    return false;
  }
}


$(document).ready(function(){
    $("#file").hide();
    $("#chkdoianh").click(function(){        
        $("#file").toggle(500);
    });
});
