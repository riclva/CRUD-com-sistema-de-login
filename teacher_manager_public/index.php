<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	
	<body>

        

       <br>
       <div align="center">
       	  <div style="width: 25%;">
        	
            <form method="POST" action="tarefa_controller.php?acao=cadastrar">
	            <input type="email" name="email" class="form-control">
	            <br>
	            <input type="password" name="senha" class="form-control">
	            <br>
	            <button class="button btn btn-danger">Efetuar cadastro</button>
            </form>

            
        </div>
       </div> 

       <br>
       <div align="center">
       	  <div style="width: 25%;">
        	
   

            <form method="POST" action="tarefa_controller.php?acao=logar">
	            <input type="email" name="email" class="form-control">
	            <br>
	            <input type="password" name="senha" class="form-control">
	            <br>
	            <button class="button btn btn-danger">Logar</button>
            </form>

            
        </div>
       </div> 


        


	</body>
</html>