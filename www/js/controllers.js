var url = "http://localhost:8888/midiasDigitaisSiteV2/www/php/";

angular.module('starter.controllers', [])


.controller('LoginCtrl', function($scope, $state, $http, Usuario) {
  $scope.login = {};
  $scope.senha = {};
  $scope.Usuario = Usuario;

  $scope.login = function(){
    console.log($scope.login.text + "" + $scope.senha.text);

    var request = $http({
        method: "post",
        url: url + "login.php",
        data: {
            login: $scope.login.text,
            senha: $scope.senha.text
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });

    /* Check whether the HTTP Request is successful or not. */
    request.success(function (data) {
        //document.getElementById("message").textContent = "You have login successfully with email "+data;
        if(data != 0){
          $scope.Usuario.usuario = data;
          $state.go("home");
        }
        else{
          alert("usuário ou senha não encontrado");
        }
    });

  }
  $scope.cadastro = function(){
    $state.go('cadastro');
  }

})

.controller('HomeCtrl', function($scope, $http, $state, Usuario) {
  console.log(Usuario.usuario);
  $scope.nome = Usuario.usuario;

  $scope.ranks = function(){
    $state.go("ranks");
  }
  $scope.logout = function(){
    Usuario.usuario = "";
    $state.go("login");
  }
})

.controller('RanksCtrl', function($scope, $http, $state, Usuario) {

  $scope.ranks = {};
  $scope.request = $http({
      method: "post",
      url: url + "ranking.php",
      data: {
        login: "",
        senha: ""
      },
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
  });
  $scope.request.success(function (data) {
      //document.getElementById("message").textContent = "You have login successfully with email "+data;
     console.log(data);
     $scope.ranks = data;
  });
  $scope.request.error(function (err){
    console.log(err);
  });
  // $scope.chats = Chats.all();
  // $scope.remove = function(chat) {
  //   Chats.remove(chat);
  // }
})


.controller('CadastroCtrl', function($scope, $http, $state) {

  $scope.nome = {};
  $scope.dataDeNascimento = {};
  $scope.genero = {};
  $scope.items = [
     { id: 1, name: 'masculino' },
     { id: 2, name: 'feminino' }
   ];
  $scope.login = {};
  $scope.senha = {};

  $scope.change = function(item) {
      console.log("Selected Serverside, text:", item.name, "value:", item.id);
      $scope.genero = item;

  };

  $scope.salvar = function(){
    //document.getElementById("message").textContent = "";
    //alert("1");
    console.log($scope.genero);
    var request = $http({
        method: "post",
        url: url + "cadastro.php",
        data: {
            nome: $scope.nome.text,
            dataNascimento: $scope.dataDeNascimento.text,
            sexo: $scope.genero.name,
            login: $scope.login.text,
            senha: $scope.senha.text
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });

    /* Check whether the HTTP Request is successful or not. */
    request.success(function (data) {
        //document.getElementById("message").textContent = "You have login successfully with email "+data;
        alert("Cadastro efetuado com sucesso");
        $state.go("login");
    });
  }

})

.factory('Usuario', function () {
    return { usuario: '' };
})

;
