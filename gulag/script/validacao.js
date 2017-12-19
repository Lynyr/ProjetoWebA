function comparaSenhas() {
  var x = document.getElementById("senha");
  var y = document.getElementById("senhaconfirm");
  if (y!=x) {
    alert ("A senha digitada está incorreta");
    return false;
  }
}
