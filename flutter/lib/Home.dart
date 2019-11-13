import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class Home extends StatefulWidget {
  @override
  _HomeState createState() => _HomeState();
}



class _HomeState extends State<Home> {

  //Controladores dos campos de texto
  TextEditingController _controllerNome = TextEditingController();
  TextEditingController _controllerConteudo = TextEditingController();
  TextEditingController _controllerData = TextEditingController();
  String _resultado = "";


  //Função para validar os campos (se não estão vazios) antes de cadastrar.
  _validarCampos(){

    if(_controllerNome.text.isNotEmpty){
      if(_controllerConteudo.text.isNotEmpty){
        if(_controllerData.text.isNotEmpty){

          //Caso todos os campos não estiverem vazios, será chamado a função para cadastrar o contato utilizando a API em PHP
          _cadastrarContato();

        }else{

          setState(() {
            _resultado = "Insira uma data válida.";
          });

        }
      }else{

        setState(() {
          _resultado = "Insira um conteúdo válido.";
        });

      }

    }else{

      setState(() {
        _resultado = "Insira um nome válido.";
      });

    }

  }
  
  //Função para cadastrar o contato no banco de dados MySQL utilizando uma API simples em PHP.
  _cadastrarContato() async {

    String nome = _controllerNome.text;
    String conteudo = _controllerConteudo.text;
    String data = _controllerData.text;

    //Altera o IP para o seu IP local caso for utilizar o emulador.
    //É recomendado deixar online utilizando alguma hospedagem de sites.
    String url = "http://192.168.0.36:80/api/add_contato.php?id=&nome=${nome}&conteudo=${conteudo}&data=${data}";
    http.Response response;

    response = await http.post(url);

    setState(() {
      _resultado = "Contato adicionado com sucesso!";
      _limparCampos();
    });

  }

  //Limpa os campos digitados.
  _limparCampos(){

    setState(() {
      _controllerNome = TextEditingController(text: "");
      _controllerConteudo = TextEditingController(text: "");
      _controllerData = TextEditingController(text: "");
    });

  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(color: Color(0xffB651E5)),
        padding: EdgeInsets.all(16),
        child: Center(
          child: SingleChildScrollView(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: <Widget>[
                Padding(
                  padding: EdgeInsets.only(bottom: 32),
                  child: Image.asset(
                    "assets/images/add_contato.png",
                    width: 150,
                    height: 100,
                  ),
                ),
                Padding(
                  padding: EdgeInsets.only(bottom: 8),
                  child: TextField(
                    controller: _controllerNome,
                    keyboardType: TextInputType.text,
                    style: TextStyle(fontSize: 20),
                    decoration: InputDecoration(
                        contentPadding: EdgeInsets.fromLTRB(32, 16, 32, 16),
                        hintText: "Nome",
                        filled: true,
                        fillColor: Colors.white,
                        border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(32))),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.only(bottom: 8),
                  child: TextField(
                  controller: _controllerConteudo,
                  keyboardType: TextInputType.text,
                  style: TextStyle(fontSize: 20),
                  decoration: InputDecoration(
                      contentPadding: EdgeInsets.fromLTRB(32, 16, 32, 16),
                      hintText: "Conteúdo",
                      filled: true,
                      fillColor: Colors.white,
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(32))),
                ),
                ),
                Padding(
                  padding: EdgeInsets.only(bottom: 8),
                  child: TextField(
                    controller: _controllerData,
                    keyboardType: TextInputType.datetime,
                    style: TextStyle(fontSize: 20),
                    decoration: InputDecoration(
                        contentPadding: EdgeInsets.fromLTRB(32, 16, 32, 16),
                        hintText: "Data",
                        filled: true,
                        fillColor: Colors.white,
                        border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(32))),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.only(top: 16, bottom: 10),
                  child: RaisedButton(
                    child: Text(
                      "Cadastrar",
                      style: TextStyle(color: Colors.white, fontSize: 20),
                    ),
                    color: Color(0xff1B65F3),
                    padding: EdgeInsets.fromLTRB(32, 16, 32, 16),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(32)
                    ),
                    onPressed: () {
                      _validarCampos();
                    },
                  ),
                ),
                Padding(
                  padding: EdgeInsets.only(top: 16),
                  child: RaisedButton(
                    child: Text(
                      "Limpar",
                      style: TextStyle(color: Color(0xff1B65F3), fontSize: 20),
                    ),
                    color: Colors.white,
                    padding: EdgeInsets.fromLTRB(32, 16, 32, 16),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(32)
                    ),
                    onPressed: () {
                        _limparCampos();
                    },
                  ),
                ),
                Center(
                  child: Text(
                  _resultado,
                  style: TextStyle(
                    color: Colors.red,
                    fontSize: 20
                  ),
                ),
                )
              ],
            ),
          ),
        ),
      ),
    );
  }
}
