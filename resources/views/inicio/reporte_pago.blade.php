@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

   <script type="text/javascript">
                    $(document).ready(function(){
                           
                            $("#6").addClass("oscuro");
                                                    
                        });
        </script>
        <div class="large-12 columns" style="pading: 0px"><h3>Reporte de Pago</h3></div>
        <div class="large-8 columns" style="padding: 0px;">
            
                <strong>Nombre del cliente</strong>
                <input type="text">
            
            
                <strong>Email</strong>
                <input type="text">
            
            
                <strong>Forma de pago</strong>
                <input type="radio" name="deposito" value="Deposito" id="dep">
                <label for="dep">Deposito</label>
                <input type="radio" name="deposito" value="Transferencia" id="transf">
                <label for="transf">Transferencia</label>
                <strong>Nro de documento</strong>
                <input type="text">
            
                <strong>Monto del pago</strong>
                <input type="text">
            
            
                <strong>Banco destino</strong>
                
                    <select>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                
           
            
                <strong>Banco de Origen</strong>
                
                    <select>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                
               <strong>Cuenta de Origen(10 digitos)</strong>
                <input type="text">
            
                <strong>Fecha de transaccion</strong>
                <input type="text">
                   
                
            
        <strong>Comentario (opcional)</strong>
                <textarea style="height: 200px;" placeholder="Escribir mensaje"></textarea>
             <a href="#" class="button large " id="buttona" >Enviar</a>
        </div>
  
	
@endsection