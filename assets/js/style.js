function validar(){
    var nome = document.getElementById("nome").value
    var inputNome = document.getElementsByTagName("input")[0]
    var msgNome = document.getElementsByTagName("span")[0]

    var login = document.getElementById("login").value
    var inputLogin = document.getElementsByTagName("input")[1]
    var msgLogin = document.getElementsByTagName("span")[1]

    var senha = document.getElementById("senha").value
    var inputSenha = document.getElementsByTagName("input")[2]
    var msgSenha = document.getElementsByTagName("span")[2]

    var csenha = document.getElementById("csenha").value
    var inputCsenha = document.getElementsByTagName("input")[3]
    var msgCsenha = document.getElementsByTagName("span")[3]

    if (nome.length < 3) {
        
        inputNome.style.borderColor ="red"
        msgNome.style.display ="block"
        return false
    }
    if(login.length < 5 ){

         inputLogin.style.borderColor ="red"
         msgLogin.style.display = "block"

         return false
    }
    if(login.length > 10 ){

        inputLogin.style.borderColor ="red"
        msgLogin.style.display = "block"

        return false
   }
   if(senha.length < 5 ){

    inputSenha.style.borderColor ="red"
    msgSenha.style.display = "block"

    return false
    }
    if(senha.length > 10 ){

    inputSenha.style.borderColor ="red"
    msgSenha.style.display = "block"

    return false
    }

    if(senha != csenha){

        inputCsenha.style.borderColor ="red"
        inputSenha.style.borderColor ="red"
        msgCsenha.style.display = "block"

        return false

    }
}
function excluir(){
  var r = confirm("Tem certeza que deseja excluir o usuario?")
  if(r == true){
      return true
  }else{
      return false
  }
}